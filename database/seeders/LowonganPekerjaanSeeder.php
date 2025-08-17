<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LowonganPekerjaan;
use Carbon\Carbon;

class LowonganPekerjaanSeeder extends Seeder
{
    public function run(): void
    {
        LowonganPekerjaan::create([
            'judul' => 'Workshop Persiapan Dunia Kerja',
            'deskripsi' => 'Pelatihan intensif bagi mahasiswa tingkat akhir untuk mempersiapkan diri menghadapi dunia kerja.',
            'gambar' => 'workshop.jpg',
            'tanggal_upload' => Carbon::now()->subDays(2),
        ]);

        LowonganPekerjaan::create([
            'judul' => 'Kunjungan Industri ke Perusahaan Teknologi',
            'deskripsi' => 'Mahasiswa PPKA mengunjungi perusahaan teknologi untuk mengenal lebih jauh tentang karier di bidang IT.',
            'gambar' => 'kunjungan.jpg',
            'tanggal_upload' => Carbon::now()->subDays(5),
        ]);

        LowonganPekerjaan::create([
            'judul' => 'Webinar Karier Bersama Alumni Sukses',
            'deskripsi' => 'Sharing session inspiratif dari alumni yang telah berhasil di dunia profesional.',
            'gambar' => 'webinar.jpg',
            'tanggal_upload' => Carbon::now()->subDays(7),
        ]);
    }
}
