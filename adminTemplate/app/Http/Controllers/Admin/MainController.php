<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\Productt;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();


        return view('admin.home', [
            'icons'=>'<i class="fa fa-home" aria-hidden="true"></i>',
            'title'=>'Admin Pages',
            'sps'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
        ]);
    }

}
