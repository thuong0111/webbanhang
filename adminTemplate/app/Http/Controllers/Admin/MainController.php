<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('admin.home', [
            'icons'=>'<i class="fa fa-home" aria-hidden="true"></i>',
            'title'=>'Admin Pages'
        ]);
    }

}
