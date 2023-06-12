<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;
use App\Http\Services\Size\SizeService;

class SizeController extends Controller
{
    protected $size;
    public function __construct(SizeService $size)
    {
        $this->size = $size;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.list', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'List Size',
            'sizes'=>$this->size->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.size.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Add New Size',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tensize'=>'required',
            'active'=>'required',
            
        ]);

        $this->size->insert($request);
        return redirect('/admin/size/list');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return view('admin.size.edit', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'Edit Size: ',
            'size' => $size,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        
        $this->validate($request, [
            'tensize'=>'required',
            'active'=>'required',
        ]);

        $result = $this->size->update($request, $size);
        if ($result) {
            return redirect('/admin/size/list');
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->size->destroy($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Delete Size success'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}