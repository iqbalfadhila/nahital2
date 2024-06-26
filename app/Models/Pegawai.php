<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    public function divisi() : HasOne
    {
        return $this->hasOne(Divisi::class, 'id', 'kode_divisi');
    }

    public function presensi() : HasMany
    {
        return $this->hasMany(Presensi::class);
    }
}
