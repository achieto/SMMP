<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPMK extends Model
{
    use HasFactory;
    protected $table = 'cpmks';
    public $timestamps = false;
    
    protected $fillable = [
        'kode_mk', 'judul'
    ];


}
