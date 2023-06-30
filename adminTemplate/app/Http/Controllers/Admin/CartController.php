<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\CTHoaDon;
use App\Models\Customer;
use App\Models\HoaDon;
use App\Models\Productt;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();

       
        return view('admin.carts.customer',[
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'List Product Orders',
            'customers'=>$this->cart->getCustomer(),
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }

    public function indexlog()
    {
        // $hd=HoaDon::orderByDesc('id')->paginate(10);

        $hd = DB::table('hoa_dons')
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();

        $sp=Productt::all()->count();
        $hd2=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.carts.customerlog',[
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'List Product Orders',
            'hoadons'=>$hd,
            'spss'=>$sp,
            'hds'=>$hd2,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
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
        $ctcart = DB::table('carts')
        ->where('carts.customer_id', $customer->id)
        ->join('pt_thanh_toans', 'carts.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'carts.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select('pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT')
        ->get();

        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.carts.detail', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'Order Detail > ' . $customer->name,
            'customer' => $customer,
            'ctcart' =>$ctcart,
            'carts' => $carts,
            'adr_customers' => $adr_customers,
            'S_customers' => $Size_customers,
            'M_customers' => $Mau_customers,
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }

    public function showlog(HoaDon $hoadon)
    {
        $cthd = DB::table('ct_hoa_dons')
        ->where('ct_hoa_dons.hoa_don_id', $hoadon->id)
        ->select('ct_hoa_dons.name','ct_hoa_dons.phone','ct_hoa_dons.email','ct_hoa_dons.address','ct_hoa_dons.content')
        ->get();
        
        $cthd_product = DB::table('ct_hoa_dons')
        ->where('ct_hoa_dons.hoa_don_id', $hoadon->id)
        ->join('productts', 'productts.id', '=', 'ct_hoa_dons.product_id')
        ->select('productts.thumb','productts.name','productts.price','ct_hoa_dons.SL','ct_hoa_dons.thanhtien' )
        ->get();

        $Size_user = DB::table('ct_hoa_dons')
        ->where('ct_hoa_dons.hoa_don_id', $hoadon->id)
        ->select('ct_hoa_dons.size')
        ->get();
        $Mau_user = DB::table('ct_hoa_dons')
        ->where('ct_hoa_dons.hoa_don_id', $hoadon->id)
        ->select('ct_hoa_dons.mau')
        ->get();

        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.carts.detaillog', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'cthd' => $cthd,
            'ctproducts' => $cthd_product,
            'maus' => $Mau_user,
            'sizes' => $Size_user,
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }

    public function danggiao(Request $request)
    {
        $capnhat=$request->input('trangthaihd');
        $id=$request->input('id');
        HoaDon::where('id',$id)
        ->update(['ds_trang_thai_id'=>$capnhat]);
        Session::flash('success', 'Cập nhật trạng thái thành công');
        return redirect('/admin/customerslog');
    }
    public function hoanthanh(Request $request)
    {
        $capnhat=$request->input('trangthaihd3');
        $id=$request->input('idhoanthanh');
        HoaDon::where('id',$id)
        ->update(['ds_trang_thai_id'=>$capnhat]);
        Session::flash('success', 'Cập nhật trạng thái thành công');
        return redirect('/admin/customerslog');
    }
   
}
