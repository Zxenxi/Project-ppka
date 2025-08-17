<?php

namespace Database\Seeders;

use App\Models\Tracer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TracerStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tracer::create([
            'title' => 'Tracer Study',
            'description' => 'A comprehensive study to track alumni career paths and outcomes.',
            'form_link' => 'https://bit.ly/Tracer_Study_UMPWR',
            'is_active' => true,
        ]);
    }
}