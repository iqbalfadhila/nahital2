<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    public function pegawai() : BelongsTo {
        return $this->belongsTo(Pegawai::class, 'nip', 'id');
    }
}
