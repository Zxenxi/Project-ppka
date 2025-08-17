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
            'judul' => 'Digital Product Executive Marketing',
            'deskripsi' => '🔍 Kualifikasi:
✅ Ulet, pekerja keras, dan suka tantangan
✅ Komunikasi yang baik
✅ Familiar dengan aplikasi digital',
            'lokasi' => 'Purworejo, Indonesia',
            'tipe_pekerjaan' => 'Full time',
            'nama_perusahaan' => 'CV. Bintang Buana Teknologi',
            'tautan_lamaran' => 'https://s.id/DPEM2025',
            'gambar' => 'workshop.jpg',
            'tanggal_upload' => Carbon::now()->subDays(2),
        ]);

        LowonganPekerjaan::create([
            'judul' => 'Kunjungan Industri ke Perusahaan Teknologi',
            'deskripsi' => 'Mahasiswa PPKA mengunjungi perusahaan teknologi untuk mengenal lebih jauh tentang karier di bidang IT.',
            'lokasi' => 'Jakarta',
            'tipe_pekerjaan' => 'Kunjungan Industri',
            'nama_perusahaan' => 'PT Teknologi Nusantara',
            'tautan_lamaran' => null,
            'gambar' => 'kunjungan.jpg',
            'tanggal_upload' => Carbon::now()->subDays(5),
        ]);

        LowonganPekerjaan::create([
            'judul' => 'Webinar Karier Bersama Alumni Sukses',
            'deskripsi' => 'Sharing session inspiratif dari alumni yang telah berhasil di dunia profesional.',
            'lokasi' => 'Online',
            'tipe_pekerjaan' => 'Webinar',
            'nama_perusahaan' => 'Alumni SMK Penabur',
            'tautan_lamaran' => 'https://example.com/webinar-register',
            'gambar' => 'webinar.jpg',
            'tanggal_upload' => Carbon::now()->subDays(7),
        ]);
    }
}