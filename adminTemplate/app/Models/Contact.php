<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    public $fillable=[
        'name',
        'address',
        'phone',
        'email',
        'title',
        'content',
    ];
}
