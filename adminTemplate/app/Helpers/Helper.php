<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{

   public static function menu($menus, $parent_id=0, $char='')
    {
        $html='';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .=
                '
                    <tr>
                        <td>' . $menu->id .'</td>
                        <td>' . $char .  $menu->name .'</td>
                        <td>' . self::active($menu->active) .'</td>
                        <td>' . $menu->description .'</td>
                        <td>' . $menu->slug .'</td>
                        <td>' . $menu->updated_at .'</td>
                        <td>&nbsp;</th>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/add">
                                <span class="icon" title="Add Category"><i class="fas fa-plus"></i></span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                                <span class="icon" title="Edit Category"><i class="fas fa-edit"></i></span>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" 
                                onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                <span class="icon" title="Delete Category"><i class="fas fa-trash"></i></span>
                            </a>
                        </td>
                    </tr>
                ';
                #delete function menu at location $key
                unset($menus[$key]);
                
                #before run function self::menu, now menu->id != 0
                $html .= self::menu($menus, $menu->id, $char . '+ ');
            }
        }
        return $html;
    }

    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus, $parent_id = 0) : string
    {
        $html ='';
        foreach($menus as $key => $menu){
            if ($menu->parent_id == $parent_id) {
                $html.= '
                    <li>
                        <a href="/danh-muc/' .$menu->id . '-' . Str::slug($menu->name, '-') .'.html">
                            ' . $menu->name . '
                        </a>';
                        unset($menu[$key]);
                        if(self::isChild($menus, $menu->id)){
                            $html.='<ul class="sub-menu">';
                            $html.=self::menus($menus, $menu->id);
                            $html.='</ul>';
                        }
                    $html.='</li>
                ';
            }
        }
        return $html;
    }
    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }
        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if($priceSale != 0) return number_format($priceSale);
        if($price != 0) return number_format($price);
        return '<a href="lien-he.html">Lien He</a>';
    }
}