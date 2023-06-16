<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function __constructt(CartService $adress)
    {
        $this->cart = $adress;
    }

    public function index()
    {
        return view('admin.carts.customer',[
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'List Product Orders',
            'customers'=>$this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $adr_customers = DB::table('customers')
        ->where('customers.id', $customer->id)
        ->join('tinh_tps', 'customers.city', '=', 'tinh_tps.id')
        ->join('quan_huyens', 'customers.district', '=', 'quan_huyens.id')
        ->join('phuong_xas', 'customers.ward', '=', 'phuong_xas.id')
        ->select('tinh_tps.tenTP', 'quan_huyens.tenQH', 'phuong_xas.tenPX')
        ->get();

        $Size_customers = DB::table('carts')
        ->where('carts.customer_id', $customer->id)
        ->join('sizes', 'carts.size', '=', 'sizes.id')
        ->select('sizes.tensize')
        ->get();

        $Mau_customers = DB::table('carts')
        ->where('carts.customer_id', $customer->id)
        ->join('maus', 'carts.mau', '=', 'maus.id')
        ->select('maus.tenmau')
        ->get();

        $carts = $this->cart->getProductForCart($customer);
        return view('admin.carts.detail', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'Order Detail > ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts,
            'adr_customers' => $adr_customers,
            'S_customers' => $Size_customers,
            'M_customers' => $Mau_customers,
        ]);
    }
   
}
