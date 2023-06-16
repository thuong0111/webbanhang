<?php

namespace App\Http\Controllers;

use App\Models\HistoryController;
use App\Http\Requests\StoreHistoryControllerRequest;
use App\Http\Requests\UpdateHistoryControllerRequest;
use App\Models\BienThe;
use App\Models\CTHoaDon;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Auth;

class HistoryControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $hoaDon_id = HoaDon::select('id')->where('user_id', $user_id)->get();
        $ctsp = CTHoaDon::where('hoa_don_id', $hoaDon_id)->get();
        return view('history.history_order',[
            'ctsp' => $ctsp
        ]);
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
    public function store(StoreHistoryControllerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryController $historyController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryController $historyController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryControllerRequest $request, HistoryController $historyController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryController $historyController)
    {
        //
    }

}
