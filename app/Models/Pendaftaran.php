<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Beritahu Laravel nama tabel yang benar (tanpa 's')
    protected $table = 'pendaftaran';

    // Beritahu Laravel nama primary key yang benar
    protected $primaryKey = 'id_pendaftaran';

    // Izinkan semua kolom untuk diisi (Mass Assignment)
    protected $guarded = [];
}