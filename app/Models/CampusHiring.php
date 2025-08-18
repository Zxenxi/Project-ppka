<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusHiring extends Model
{
    use HasFactory;

    // Use snake_case for table names
    protected $table = 'campus_hirings';

    protected $fillable = [
        'title',
        'description',
        'registration_link',
        'poster_image_path',
        'kategori',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}