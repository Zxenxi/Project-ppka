<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('beritas')->insert([
            [
                'judul' => 'Workshop Persiapan Dunia Kerja',
                'deskripsi' => 'Pelatihan intensif bagi mahasiswa tingkat akhir untuk mempersiapkan diri menghadapi dunia kerja.',
                'gambar' => 'workshop.jpg',
                'tanggal_upload' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan Industri ke Perusahaan Teknologi',
                'deskripsi' => 'Mahasiswa PPKA mengunjungi perusahaan teknologi untuk mengenal lebih jauh tentang karier di bidang IT.',
                'gambar' => 'kunjungan.jpg',
                'tanggal_upload' => Carbon::now()->subDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Webinar Karier Bersama Alumni Sukses',
                'deskripsi' => 'Sharing session inspiratif dari alumni yang telah berhasil di dunia profesional.',
                'gambar' => 'webinar.jpg',
                'tanggal_upload' => Carbon::now()->subDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
