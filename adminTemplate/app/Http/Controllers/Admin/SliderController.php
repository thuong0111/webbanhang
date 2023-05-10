<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.list', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'List Slider',
            'sliders'=>$this->slider->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.slider.add', [
            'icons'=>'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
            'title' => 'Add New Slider',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required',
        ]);

        $this->slider->insert($request);
        return redirect('/admin/sliders/list');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            'icons'=>'<i class="fa fa-link" aria-hidden="true"></i>',
            'title' => 'Edit Sliders: ',
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        
        $this->validate($request, [
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required',
        ]);

        $result = $this->slider->update($request, $slider);
        if ($result) {
            return redirect('/admin/sliders/list');
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if ($result) {
            return response()->json([
                'error'=>false,
                'message'=>'Delete slider success'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
