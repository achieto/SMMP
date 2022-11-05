<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPS extends Model
{
    use HasFactory;
    protected $table = 'rpss';

    protected $fillable = [
        'id_mk','nomor','prodi', 'dosen','pengembang','koordinator','kaprodi','kurikulum', 'semester', 'materi_mk', 'pustaka_utama', 'pustaka_pendukung'
    ];
}
