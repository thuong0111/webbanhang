<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\PhuongXa;
use Illuminate\Support\Facades\DB;
use App\Models\TinhTP;
use App\Models\QuanHuyen;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if($result === false)
        {
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show()
    {
        $prod=TinhTP::all();
        $productts = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Shopping Cart',
            'productts'=>$productts,
            'carts' => Session::get('carts'),
            'prod'=>$prod
        ]);
    }
    public function findQuanHuyen(Request $request){

        $data=QuanHuyen::where('tinh_tp_id', $request->id)->get();
        return response()->json($data);
	}
    public function findPhuongXa(Request $request){

        $data=PhuongXa::where('quan_huyen_id', $request->id)->get();
        return response()->json($data);
	}
    public function update (Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);
        return redirect()->back();
    }


}
