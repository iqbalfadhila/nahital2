<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';

    public function pegawai() : BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'kode_divisi', 'kode_divisi');
    }
}
