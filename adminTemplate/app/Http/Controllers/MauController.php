<?php

namespace App\Http\Controllers;

use App\Models\Mau;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\Request;
use App\Http\Services\Mau\MauService;

class MauController extends Controller
{
    protected $mau;
    public function __construct(MauService $mau)
    {
        $this->mau = $mau;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mau.list', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'List Mau',
            'maus'=>$this->mau->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.mau.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Add New Mau',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tenmau'=>'required',
            'active'=>'required',
            
        ]);

        $this->mau->insert($request);
        return redirect('/admin/mau/list');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mau $mau)
    {
        return view('admin.mau.edit', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'Edit Mau: ',
            'mau' => $mau,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mau $mau)
    {
        
        $this->validate($request, [
            'tenmau'=>'required',
            'active'=>'required',
        ]);

        $result = $this->mau->update($request, $mau);
        if ($result) {
            return redirect('/admin/mau/list');
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->mau->destroy($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Delete Mau success'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
