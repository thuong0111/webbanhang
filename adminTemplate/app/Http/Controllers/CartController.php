<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\PhuongXa;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Productt;
use App\Models\TinhTP;
use App\Models\QuanHuyen;
use Illuminate\Support\Facades\Auth;

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

<<<<<<< HEAD
    public function history()
    {
        $customers = DB::table('carts')
            ->join('productts', 'productts.id', '=', 'carts.product_id')
            ->join('customers', 'customers.id', '=', 'carts.customer_id')
            ->get();
        return view('history.history', [
            // 'title' => 'Order Detail' . $customer->name,
            'customers' => $customers,
            // 'carts' => $carts,

        ]);
=======
    public function update (Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
>>>>>>> 267e447744c89348d9b33a96791c3bb366a506a0
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
