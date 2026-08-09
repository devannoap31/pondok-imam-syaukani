<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $guarded = [];

    protected $casts = [
        'tanggal_publish' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
