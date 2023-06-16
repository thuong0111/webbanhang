<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\BienThe;
use App\Models\Cart;
use App\Models\CTHoaDon;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\HoaDon;
use App\Models\Productt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\Auth;
use ZipStream\Bigint;

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
                    $product_id => $qty,
                ]);
                return true;    
            } 
        // $exists = Arr::exists($carts, $product_id);
        // $exists_size = Arr::exists($size_products, $size_id);
        // if($exists and $exists_size) {
        //     $carts[$product_id] = $carts[$product_id] + $qty;
        //     Session::put('carts', $carts);
        //     return true;
        // }

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
        // for($i=0;$i<FacadesCart::count();$i++){
        //  $rowId = $request->input('rowId_cart');
        //  $qty = $request->input('num_product');
        //  FacadesCart::update($rowId, $qty);
        // }
        // return true;
        
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
            // DB::beginTransaction();
            // $carts = Session::get('carts');
            // if(is_null($carts))
            //     return false;

            if(Auth::check()){
                $hd = HoaDon::create([
                    'user_id' => Auth::user()->id,
                    'tongtien' => (int)$request->input('tongtien'),
                ]);
                $content = FacadesCart::content();
                $data=[];
                foreach($content as $v_content){
                    $data[] = [
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'address' => $request->input('address'),
                        'email' => $request->input('email'),
                        'content' => $request->input('content'),
                        'hoa_don_id' => $hd->id,
                        'product_id'=>$v_content->id,
                        'size'=>(int)$request->input('sizessss'),
                        'mau'=>(int)$request->input('maussss'),
                        'SL'=>$v_content->qty,
                        'gia'=>(int)$v_content->price,
                        'thanhtien'=>(int)$request->input('thanhtien')
                    ];
                }
                CTHoaDon::insert($data);
                // BienThe::where('san_pham_id',$data['product_id'])
                // ->where('size_id',$data['size_id'])
                // ->where('mau_id',$data['mau'])
                // ->update();
                FacadesCart::destroy();
            }else{
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

                $this->infoProductCart($customer->id);
                FacadesCart::destroy();
            }

            
            // DB::commit();
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

    protected function infoProductCart($customer_id)
    {
        $content = FacadesCart::content();
            $data=[];
            foreach($content as $v_content){
                $data[]=[
                    'customer_id'=>$customer_id,
                    'product_id'=>$v_content->id,
                    'pty'=>$v_content->qty,
                    'price'=>$v_content->price,
                    'size'=>$v_content->options->sizes,
                    'mau'=>$v_content->options->colors,
                ];
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
