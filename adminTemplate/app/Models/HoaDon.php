<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoa_dons';
    protected $fillable = [
        'user_id',
        'tongtien',
        'id',
        // 'ds_trang_thai_id',
        // 'pt_thanh_toan_id'

    ];
}
