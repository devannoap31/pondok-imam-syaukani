<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    use HasFactory;

    protected $table = 'rekening_bank';
    protected $primaryKey = 'id_rekening';
    protected $guarded = [];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];
}
