<?php

namespace App\Http\Services\Mau;
use App\Models\Mau;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MauService
{
    public function insert($request)
    {
        try{
            $request->except('_token');
            Mau::create($request->input());
            Session::flash('success', 'Thêm màu thành công.');
        }catch(\Exception $err){
            Session::flash('error', 'Thêm màu thất bại.');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
    public function get()
    {
        return Mau::orderByDesc('id')->paginate(15);
    }

    public function update($request, $mau)
    {
        try {
            $mau->fill($request->input());
            $mau->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('success', 'Cập nhật thất bại.');
            Log::info($err->getMessage());
            
            return false;
        }

        return true;
        
    }
    public function destroy($request)
    {
        $mau = Mau::where('id', $request->input('id'))->first();
        if ($mau) {
            $mau->delete();
            return true;
        }
        return false;
    }

    
    public function show()
    {
        return Mau::where('active', 1)->orderByDesc('sort_by')->get();
    }
}