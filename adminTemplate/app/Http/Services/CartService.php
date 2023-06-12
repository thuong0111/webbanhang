<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\BienThe;
use App\Models\Cart;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Productt;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function create($request)
    {
        $qty =(int)$request->input('num_product');
        $product_id =(int)$request->input('product_id');
        $size_id =(int)$request->input('size_id');
        // $mau_id =(int)$request->input('mau_id');   
        //test     
        if($qty <= 0 || $product_id <= 0)
        {
            Session::flash('error', 'The quantity is incorrect.');
            return false;
        }
        $carts = Session::get('carts');
        $size_products = Session::get('sizess');
            if(is_null($carts)){
                Session::put('carts', [
                    $product_id => $qty,
                ]);
                Session::put('sizess', [
                    $size_id => $qty,
                ]);
                return true;    
            } 
        $exists = Arr::exists($carts, $product_id);
        $exists_size = Arr::exists($size_products, $size_id);
        if($exists and $exists_size) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        // $size_products[$size_id] = $product_id;
        // dd($size_products[$size_id]);
        // Session::put('sizess', $size_products);
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        
        return true;
    }

    

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];
        $productId = array_keys($carts);
        return Productt::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }
   

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }
    

    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if(is_null($carts))
                return false;
             $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
            ]);
            $size=$request->input('size');
            $mau=$request->input('mau');

            $this->infoProductCart($carts, $customer->id,$size,$mau);
            DB::commit();
            Session::flash('success', 'Orders success.');

            #Queue
            // SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Orders fail.');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id,$size,$mau)
    {
        $productId = array_keys($carts);
        $productts = Productt::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
        $data= [];
        foreach ($productts as $productt) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $productt->id,
                'pty' => $carts[$productt->id],
                'price' => $productt->price_sale != 0 ? $productt->price_sale : $productt->price,
                'size' =>$size,
                'mau' =>$mau,
            ];
        //    $slcart=$carts[$productt->id];
        //    $sl=Productt::select('SL')->where('id',$productt->id)->get();
        //    $slupdate=$sl-$slcart;
        //    Productt::where('id',$productt->id)->update(['SL'=>$slupdate]);
        }
        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(10);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query){
            $query->select('id', 'name', 'thumb');
        }])->get();
    }
}
