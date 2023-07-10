<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\HoaDon;
use App\Models\Mau;
use App\Models\Menu;
use App\Models\Productt;
use App\Models\Size;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_category(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_menu = Menu::where('name','like','%'.$keywords.'%')->get();
        return view('admin.menu.list',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'menus'=>$search_menu,
        ]);
    }

    public function search_product(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_prd = Productt::where('name','like','%'.$keywords.'%')->get();
        return view('admin.productt.list_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'productts'=>$search_prd,
        ]);
    }
    public function search_color(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_color = Mau::where('tenmau','like','%'.$keywords.'%')->get();
        return view('admin.mau.list_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'maus'=>$search_color,
        ]);
    }
    public function search_size(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_size = Size::where('tensize','like','%'.$keywords.'%')->get();
        return view('admin.size.list_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'sizes'=>$search_size,
        ]);
    }

    public function search_slider(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_slider = Slider::where('name','like','%'.$keywords.'%')->get();
        return view('admin.slider.list_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'sliders'=>$search_slider,
        ]);
    }
    public function search_discount(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_slider = Coupon::where('tengg','like','%'.$keywords.'%')->get();
        return view('admin.giamgia.list_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'sizes'=>$search_slider,
        ]);
    }
    public function search_bill(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_bill = User::where('phone','like','%'.$keywords.'%')->orderByDesc('id')
        ->paginate(10);
        return view('admin.carts.customerlog',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'hoadons'=>$search_bill,
        ]);
    }
    public function search_user(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_user = User::where('name','like','%'.$keywords.'%')->get();
        return view('admin.manager_user.list_customer_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'Users'=>$search_user,
        ]);
    }
    public function search_uservl(Request $request){
        $sp=Productt::all()->count();
        $hd=HoaDon::all()->count();
        $user=User::all()->count();
        $hdvl=Cart::all()->count();
        $keywords = $request->keywords_submit;
        $search_uservl = Customer::where('name','like','%'.$keywords.'%')->get();
        return view('admin.carts.customer_search',[
            'spss'=>$sp,
            'hds'=>$hd,
            'users'=>$user,
            'hdvls'=>$hdvl,
            'customers'=>$search_uservl,
        ]);
    }
}
