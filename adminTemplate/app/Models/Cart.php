<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'pty',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Productt::class, 'id', 'product_id');
    }
}
