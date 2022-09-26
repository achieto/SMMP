<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\CplAspekEnum;

class CPL extends Model
{
    use HasFactory;
    protected $table = 'cpls';

    protected $fillable = [
        'judul', 'keterangan', 'kurikulum'
    ];

    protected $casts = [
        'aspek' => CplAspekEnum::class
    ];
}
