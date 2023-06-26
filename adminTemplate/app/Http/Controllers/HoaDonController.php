<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreHoaDonRequest;
use App\Http\Requests\UpdateHoaDonRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user_id = Auth::user()->id;
        $layhd = DB::table('hoa_dons')
        ->where('user_id', $user_id)
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();
        // $hoaDon_id = HoaDon::select('id')->where('user_id', $user_id)->get();
        // $data = [];
        // foreach($hoaDon_id as $hoadonsp){
        //     $data [] = CTHoaDon::select('id', 'name')
        //     ->where('hoa_don_id', $hoadonsp->id)->get();
        // }
        // $htr_s = $data;
        // $hoaDon_id = DB::table('hoa_dons')
        // ->where('user_id', $user_id)
        // ->join('ct_hoa_dons', 'hoa_dons.id', '=', 'ct_hoa_dons.hoa_don_id')
        // ->join('productts','ct_hoa_dons.product_id', '=', 'productts.id')
        // ->join('sizes', 'ct_hoa_dons.size', '=', 'sizes.id')
        // ->join('maus', 'ct_hoa_dons.mau', '=', 'maus.id')
        // ->select('productts.name', 'productts.price','productts.thumb','ct_hoa_dons.SL'
        //     ,'ct_hoa_dons.thanhtien', 'sizes.tensize', 'maus.tenmau', 'hoa_dons.tongtien'
        //     ,'hoa_dons.id')
        // ->get();
        return view('history.history_order',[
            'hoadons' => $layhd,
        ]);
    }
    public function DangXuLy()
    {
        
        $user_id = Auth::user()->id;
        $layhd = DB::table('hoa_dons')
        ->where('user_id','=', $user_id)
        ->where('ds_trang_thai_id','=', 1)
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();
        return view('history.dang_xu_ly',[
            'hoadons_dxl' => $layhd,
        ]);
    }

    public function DaHuyHD()
    {
        
        $user_id = Auth::user()->id;
        $layhd = DB::table('hoa_dons')
        ->where('user_id', $user_id)
        ->where('ds_trang_thai_id', 4)
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();
        return view('history.da_huy',[
            'hoadons_dh' => $layhd,
        ]);
    }

    public function DangGiaoHang()
    {
        
        $user_id = Auth::user()->id;
        $layhd = DB::table('hoa_dons')
        ->where('user_id', $user_id)
        ->where('ds_trang_thai_id', 2)
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();
        return view('history.dang_giao',[
            'hoadons_dg' => $layhd,
        ]);
    }

    public function HoaDonDaHoanThanh()
    {
        $user_id = Auth::user()->id;
        $layhd = DB::table('hoa_dons')
        ->where('user_id', $user_id)
        ->where('ds_trang_thai_id', 3)
        ->join('users', 'hoa_dons.user_id', '=', 'users.id')
        ->join('pt_thanh_toans', 'hoa_dons.pt_thanh_toan_id', '=', 'pt_thanh_toans.id')
        ->join('ds_trang_thais', 'hoa_dons.ds_trang_thai_id', '=', 'ds_trang_thais.id')
        ->select( 'hoa_dons.id','users.name','users.phone','users.email', 'pt_thanh_toans.tenthanhtoan','ds_trang_thais.tenTT','hoa_dons.thoigian','hoa_dons.tongtien')
        ->get();
        return view('history.da_hoan_thanh',[
            'hoadons_ht' => $layhd,
        ]);
    }

    public function showdetail(HoaDon $hoadon)
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

        return view('history.history_detail', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'cthd' => $cthd,
            'ctproducts' => $cthd_product,
            'maus' => $Mau_user,
            'sizes' => $Size_user,
        ]);
    }

    public function dahuy(Request $request)
    {
        $capnhat=$request->input('trangthaihd4');
        $id=$request->input('idhoadonhuy');
        HoaDon::where('id',$id)
        ->update(['ds_trang_thai_id'=>$capnhat]);
        Session::flash('success', 'Cập nhật trạng thái thành công');
        return redirect('/history');
    }


   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHoaDonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHoaDonRequest $request, HoaDon $hoaDon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoaDon $hoaDon)
    {
        //
    }
}
