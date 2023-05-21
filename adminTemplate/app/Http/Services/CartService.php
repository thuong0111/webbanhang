<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Productt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function create($request)
    {
        $qty =(int)$request->input('num_product');
        $product_id =(int)$request->input('product_id');
        if($qty <= 0 || $product_id <= 0)
        {
            Session::flash('error', 'The quantity is incorrect.');
            return false;
        }

        $carts = Session::get('carts');
        if(is_null($carts)){
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if($exists){

            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

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
            $this->infoProductCart($carts, $customer->id);

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

    protected function infoProductCart($carts, $customer_id)
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
                'price' => $productt->price_sale != 0 ? $productt->price_sale : $productt->price
            ];
           return Cart::insert($data);
        }
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

    public function detail_adress($request)
    {
        $adress_customers = DB::table('customers')
        ->where('ten', $request->ten)
        ->join('tinh_tps', 'customers.ten', '=', 'tinh_tps.id')
        ->join('quan_huyens', 'customers.ten', '=', 'quan_huyens.id')
        ->join('phuong_xas', 'customers.ten', '=', 'phuong_xas.id')
        ->select('tinh_tps.ten', 'quan_huyens.ten', 'phuong_xas.ten')
        ->get();
    }
}
