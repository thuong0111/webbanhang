<?php


namespace App\Http\Services\Productt;


use App\Models\BienThe;
use App\Models\Mau;
use App\Models\Productt;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class ProducttService
{
    const LIMIT = 10;

    public function get($page = null)
    {
        return Productt::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Productt::where('id', $id)
        ->where('active', 1)
        ->with('menu')
        ->firstOrFail();
    }

    public function getSize($id)
    {
       $idsize=BienThe::select('size_id')->where('san_pham_id', '=', $id)->get();
       foreach($idsize as $ids){
        $tam[]=Size::select('id', 'tensize')->where('id',$ids->size_id)->get();
        

       }
        return $tam;
    }
    public function getMau($id)
    {
       $idmau=BienThe::select('mau_id')->where('san_pham_id', '=', $id)->get();
       foreach($idmau as $idm){
        $tam[]=Mau::select('id', 'tenmau')->where('id',$idm->mau_id)->get();
       }
        return $tam;
    }
    public function getRelated($id)
    {
       $lienquan=Productt::select('menu_id')->where('id',$id)->get();
       $lay=Productt::where('menu_id',$lienquan)->whereNotIn('id',[$id])->get();
        return $lay;
    }


    public function more($id)
    {
        return Productt::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(4)
            ->get();
    }
}
