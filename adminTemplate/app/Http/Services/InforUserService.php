<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class InforUserService 
{
    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Update success');
        } catch (\Exception $err) {
            Session::flash('error', 'Error plase again !');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
   
}
