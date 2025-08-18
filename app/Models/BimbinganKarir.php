<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimbinganKarir extends Model
{
    use HasFactory;

    protected $table = 'bimbingan_karir';

    // NEW: Add the new fields to the fillable array
    protected $fillable = [
        'title',
        'description',
        'registration_link',
        'poster_image_path',
        'kategori',
        'start_date',
        'end_date',
    ];

    // NEW: Add casts to automatically handle date fields
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}