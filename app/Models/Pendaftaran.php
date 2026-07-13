<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $guarded = [];

    public function berkas(): HasMany
    {
        return $this->hasMany(BerkasPendaftaran::class, 'pendaftaran_id', 'id_pendaftaran');
    }
}