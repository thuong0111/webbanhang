<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\View\Composers\CartComposer;
use App\Models\BienThe;
use App\Models\Mau;
use App\Models\PhuongXa;
use App\Models\Productt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\TinhTP;
use App\Models\QuanHuyen;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
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

    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }
    
    public function delete_to_cart($rowId,$id = 0){
        Session::forget('carts');
        Cart::update($rowId, 0);
        $this->cartService->remove($id);
       
        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);
        return redirect()->back();
    }

   
    
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->id;
        $qty = $request->sl;
        Cart::update($rowId, $qty);
        return redirect('/carts');
    }
    public function findmau(Request $request){
        
        $data= DB::table('bien_thes')
        -> where('san_pham_id', $request->idpro)
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
}
