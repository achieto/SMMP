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
        'id_mk', 'judul'
    ];

    public function mk()
    {
        return $this->belongsTo(MK::class, 'id_mk');
    }
}
