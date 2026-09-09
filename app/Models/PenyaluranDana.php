<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranDana extends Model
{
    use HasFactory;

    protected $table = 'penyaluran_dana';
    protected $primaryKey = 'id_penyaluran';
    protected $guarded = [];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];
}
