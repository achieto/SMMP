<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MK extends Model
{
    
    use HasFactory;
    protected $table = 'mks';
    protected $fillable = [
        'kode', 'nama', 'rumpun', 'semester', 'prasyarat', 'kurikulum', 'deskripsi', 'bobot_teori', 'bobot_praktikum', 'dosen'
    ];
}
