<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tanggal_upload'];
    protected $casts = [
    'tanggal_upload' => 'datetime',
];
}

