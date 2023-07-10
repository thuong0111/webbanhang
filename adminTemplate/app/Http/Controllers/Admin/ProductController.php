<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Productt\ProducttRequest;
use App\Http\Services\Productt\ProducttAdminService;
use App\Models\Cart;
use App\Models\HoaDon;
use App\Models\Productt;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProducttAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.productt.list', [
            'icons'=>'<i class="nav-icon fas fa-store-alt"></i>',
            'title' => 'Danh Sach Quần Áo',
            'productts' => $this->productService->get(),
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }

    public function create()
    {
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.productt.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Thêm Quần Áo',
            'menus' => $this->productService->getMenu(),
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }
    public function store(ProducttRequest $request)
    {
        $this->productService->insert($request);

        return redirect('/admin/ctsp/add');
    }

    public function show(Productt $productt)
    {
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.productt.edit', [
            'icons'=>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'title' => 'Sửa Quần Áo ',
            'productt' => $productt,
            'menus' => $this->productService->getMenu(),
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }
    public function update(Request $request, Productt $productt)
    {
        $result = $this->productService->update($request, $productt);
        if($result)
        {
            return redirect('/admin/productts/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Xóa Sản Phẩm thành công'
            ]);
        }
        return response()->json(['error'=>true]);

    }

   
}
