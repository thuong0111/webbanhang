<?php


namespace App\Http\Services\Productt;


use App\Models\Productt;

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
