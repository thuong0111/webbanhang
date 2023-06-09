<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productt extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'thumb',
        'SL',
        'view'
    ];
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
        ->withDefault(['name' => '']);
    }
}
