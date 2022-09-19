<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MK extends Model
{
    use HasFactory;
    protected $table = 'mks';
    protected $fillable = [
        'kode', 'nama', 'deskripsi', 'rumpun', 'semester', 'prasyarat', 'kurikulum', 'bobot_teori', 'bobot_praktikum', 'dosen', 'materi', 'pustaka_utama', 'pustaka_pendukung'
    ];
}
