<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Productt\ProducttRequest;
use App\Http\Services\Productt\ProducttAdminService;
use App\Models\Productt;
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
        return view('admin.productt.list', [
            'icons'=>'<i class="nav-icon fas fa-store-alt"></i>',
            'title' => 'List Products',
            'productts' => $this->productService->get()
        ]);
    }

    public function create()
    {
        return view('admin.productt.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Add New Products',
            'menus' => $this->productService->getMenu(),
        ]);
    }
    public function store(ProducttRequest $request)
    {
        $this->productService->insert($request);

        return redirect('/admin/ctsp/add');
    }

    public function show(Productt $productt)
    {
        return view('admin.productt.edit', [
            'icons'=>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'title' => 'Edit Products: ',
            'productt' => $productt,
            'menus' => $this->productService->getMenu()
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
                'message'=>'Delete product success'
            ]);
        }
        return response()->json(['error'=>true]);

    }
}
