<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasPesantren extends Model
{
    protected $table = 'fasilitas_pesantren';
    protected $primaryKey = 'id_fasilitas';
    protected $guarded = [];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
