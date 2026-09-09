<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanDonasi extends Model
{
    use HasFactory;

    protected $table = 'tujuan_donasi';
    protected $primaryKey = 'id_tujuan';
    protected $guarded = [];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];
}
