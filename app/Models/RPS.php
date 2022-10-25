<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPS extends Model
{
    use HasFactory;
    protected $table = 'rpss';

    protected $fillable = [
        'nomor','id_mk','dosen','kurikulum','pengembang', 'koordinator', 'kaprodi', 'semester', 'materi_mk', 'pustaka_utama', 'pustaka_pendukung'
    ];
}
