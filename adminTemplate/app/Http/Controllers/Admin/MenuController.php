<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;


class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title'=>'Add New Category',
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect('/admin/menus/list');
        // return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'icons'=>'<i class="nav-icon fas fa-tachometer-alt"></i>',
            'title'=>'List Products',
            'menus'=>$this->menuService->getAll()
        ]);
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'icons'=>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'title'=>'Edit Category: ' . $menu->name,
            'menu'=>$menu,
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {

        $this->menuService->update($request, $menu);
        
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Delete success'
            ]);
        }
        return response()->json([
            'error'=>true,
        ]);
    }

    
}
