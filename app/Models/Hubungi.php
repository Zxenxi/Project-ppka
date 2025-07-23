<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungi extends Model
{
    use HasFactory;

    protected $table = 'hubungi'; // pakai nama tabel eksplisit
    protected $fillable = ['nama', 'email', 'pesan'];
}
