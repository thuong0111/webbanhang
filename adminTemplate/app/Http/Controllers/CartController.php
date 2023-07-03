<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\View\Composers\CartComposer;
use App\Models\BienThe;
use App\Models\Coupon;
use App\Models\Mau;
use App\Models\PhuongXa;
use App\Models\Productt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\TinhTP;
use App\Models\QuanHuyen;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $message='tt k hop le';
        $qty =(int)$request->input('num_product');
        $result = $this->cartService->create($request);
        $size_id =(int)$request->input('size_id');
        $mau_id =(int)$request->input('mau_id');
        $tensize=Size::where('id',$size_id)->get();
        $tenmau=Mau::where('id',$mau_id)->get();
        $product_id =(int)$request->input('product_id');
        // $carts = Session::get('carts');
        $productts = Productt::select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('id', $product_id)
        ->get();
        if (empty($size_id) || empty($mau_id) || $qty <= 0) {

            return $message;
        }
        else{
            foreach($productts as $tam){
                $name=$tam->name;
                $price=$tam->price;
                $thumb=$tam->thumb;
            }
            foreach($tensize as $tam){
                $laytensize=$tam->tensize;
            }
            foreach($tenmau as $tam){
                $laytenmau=$tam->tenmau;
            }
            // $qty=$carts[$product_id];
            $data['id'] = $product_id;
            $data['qty'] = $qty;
            $data['options']['colors'] =$laytenmau;
            $data['options']['sizes'] = $laytensize;
            $data['name'] = $name;
            $data['price'] = $price;
            $data['weight'] = '170';
            $data['options']['image'] = $thumb;
            Cart::add($data);
        }

        if($result === false)
        {
            return redirect()->back();
        }

        return redirect('/carts')->with('sizes', $size_id)->with('maus', $mau_id);
    }

    public function show()
    {
        $prod=TinhTP::all();
        $productts = $this->cartService->getProduct();
        $size_product=Session::get('sizes');
        $mau_product=Session::get('maus');
        // $tensize=Size::where('id',$size_product)->get();
        // $tenmau=Mau::where('id',$mau_product)->get();
        return view('carts.list', [
            'title' => 'Shopping Cart',
            'productts'=>$productts,
            'carts' => Session::get('carts'),
            'sizesss'=>$size_product,
            'mausss'=>$mau_product,
            'prod'=>$prod
        ]);
    }

    public function vnpay(Request $request)
    {
        $this->cartService->createvnpay($request);
        return redirect('/carts');
    }
    public function thanhcong()
    {
        
        Cart::destroy();
        Session::forget('carts');
        Session::flash('success', 'Orders success.');
        return redirect('/carts');
    }
    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function delete_to_cart($rowId){
        // Session::forget('carts');
        Cart::update($rowId, 0);
        // $this->cartService->remove($id);
        if(Cart::Count()==0){
            Session::forget('carts');
        }


        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);
        return redirect()->back();
    }



    public function update(Request $request)
    {
        // $rowId=$request->input('rowId_cart');
        // $product_id=(string)$request->input('id_product');
        // $product_ids=$request->input($product_id);
        // dd($product_ids);
        // $carts=(Session::get('carts'));
        // $sl=$carts[$product_id];
        $this->cartService->update($request);
        // Cart::update($rowId,['qty'=>$sl]);
        return redirect('/carts');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->input('rowId_cart');
        $qty = $request->input('num_product');
        foreach ($rowId as $row){
            Cart::update($row,$qty[$row]);
        }
        return redirect('/carts');
    }
    public function findmau(Request $request){

        $data= DB::table('bien_thes')
        ->where('san_pham_id', $request->idpro)
        ->where('size_id', $request->id)
        ->join('maus', 'maus.id', '=', 'bien_thes.mau_id')
        ->select('maus.id', 'maus.tenmau')
        ->get();
        return response()->json($data);
	}

    public function findsize(Request $request){

        $data= DB::table('bien_thes')
        -> where('san_pham_id', $request->idpro)
        ->where('mau_id', $request->id)
        ->join('sizes', 'sizes.id', '=', 'bien_thes.size_id')
        ->select('sizes.id', 'sizes.tensize')
        ->get();
        return response()->json($data);
	}

    public function findQuanHuyen(Request $request){

        $data=QuanHuyen::where('tinh_tp_id', $request->id)->get();
        return response()->json($data);
	}

    public function findPhuongXa(Request $request){

        $data=PhuongXa::where('quan_huyen_id', $request->id)->get();
        return response()->json($data);
	}

    public function giamgia(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('magg',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                        'magg'>$coupon->magg,
                        'tngg'=> $coupon->tngg,
                        'sotiengg' => $coupon->sotiengg,
                        );
                        Session::put('coupon',$cou);
                    }
                }
                else{
                    $cou[] = array(
                        'magg'>$coupon->magg,
                        'tngg'=> $coupon->tngg,
                        'sotiengg' => $coupon->sotiengg,
                );
                Session::put('coupon',$cou);
            }
                Session::save();
                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        }else{
            return redirect()->back()->with('error', 'Mã giảm giá không chính xác!!!');
        }
    }
}
