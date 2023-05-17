<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserManagerService;
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
        return view('admin.manager_user.list_customer',[
            'icons'=>'<i class="fa fa-cart-plus" aria-hidden="true"></i>',
            'title' => 'List Users',
            'Users'=>$this->User->getUser()
        ]);
    }

}
