<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    protected $table = 'ustadzs';
    protected $primaryKey = 'id_ustadz';
    protected $guarded = [];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    /**
     * Nama lengkap dengan gelar
     */
    public function getNamaLengkapAttribute(): string
    {
        return $this->gelar
            ? $this->nama . ', ' . $this->gelar
            : $this->nama;
    }
}
