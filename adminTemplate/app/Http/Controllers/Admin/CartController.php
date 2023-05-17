<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\TinhTP;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;
use App\Http\Controllers\SelectController;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
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
        $carts = $this->cart->getProductForCart($customer);
        return view('admin.carts.detail', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'Order Detail' . $customer->name,
            'customer' => $customer,
            'carts' => $carts,


        ]);
    }

	


}
