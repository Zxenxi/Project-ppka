<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    protected $table = 'lowongan_pekerjaan';
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tanggal_upload', 'lokasi', 'tipe_pekerjaan', 'nama_perusahaan', 'tautan_lamaran'];
    protected $casts = [
    'tanggal_upload' => 'datetime',
];
}
