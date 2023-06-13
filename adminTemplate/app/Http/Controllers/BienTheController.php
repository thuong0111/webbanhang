<?php

namespace App\Http\Controllers;

use App\Models\Productt;
use App\Http\Requests\StoreBienTheRequest;
use App\Http\Requests\UpdateBienTheRequest;
use App\Http\Services\Bienthe\BTService;
use App\Models\BienThe;
use Illuminate\Http\Request;

class BienTheController extends Controller
{
    protected $btService;

    public function __construct(BTService $btService)
    {
        $this->btService = $btService;
    }

    public function index()
    {
        return view('admin.ctsp.list', [
            'icons'=>'<i class="nav-icon fas fa-store-alt"></i>',
            'title' => 'List CTSP',
            'ctsps' => $this->btService->get()
        ]);
    }

    public function create()
    {
        return view('admin.ctsp.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Add New CTSP',
            'sps' => $this->btService->getSP(),
            'sizes' => $this->btService->getSize(),
            'maus' => $this->btService->getMau(),
        ]);
    }
    public function store(Request $request)
    {
        $this->btService->insert($request);

        return redirect('/admin/ctsp/list');
    }

    public function show(BienThe $ctsp)
    {
        return view('admin.ctsp.edit', [
            'icons'=>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            'title' => 'Edit CTSP: ',
            'ctsp' => $ctsp,
            'sps' => $this->btService->getSP(),
            'sizes' => $this->btService->getSize(),
            'maus' => $this->btService->getMau()
        ]);
    }
    public function update(Request $request, BienThe $ctsp)
    {
        $result = $this->btService->update($request, $ctsp);
        if($result)
        {
            return redirect('/admin/ctsp/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->btService->delete($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Delete CTSP success'
            ]);
        }
        return response()->json(['error'=>true]);

    }
}
