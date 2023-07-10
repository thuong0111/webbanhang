<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserManagerService;
use App\Models\Cart;
use App\Models\HoaDon;
use App\Models\Productt;
use App\Models\User;

use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    protected $User;

    public function __construct(UserManagerService $User)
    {
        $this->User = $User;
    }
    public function index()
    {
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.manager_user.list_customer',[
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'Danh Sách Khách Hàng',
            'Users'=>$this->User->getUser(),
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl
        ]);
    }

    public function show(User $users)
    {

        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $view_sp=Productt::orderBy('view','DESC')->take(10)->get();
        $hdvl=Cart::all()->count();
        return view('admin.manager_user.detail_customer', [
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'Thông Tin Khách Hàng >'. $users->name,
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'sp_view'=>$view_sp,
            'hdvls'=>$hdvl,
            'users'=> $users
        ]);
    }

}
