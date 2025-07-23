<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tahun_lulus',
        'email',
        'no_hp',
        'status',
        'instansi',
        'pesan',
    ];
}
