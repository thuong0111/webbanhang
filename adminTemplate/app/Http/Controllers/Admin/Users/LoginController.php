<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.login', [
            'title' =>'Login systems'
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
    public function store(Request $request)
    {
        // $remember = isset($request->input('remember')) ?true:false;
        $this->validate($request, [
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        if(Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password')
        ],$request->input('remember'))) {
            return redirect()->route('admin');
        }
        
        Session::flash('error', 'Email or pass not correct');
        // Session::flash('success', 'Login success');
        return redirect()->back();
    }

}
