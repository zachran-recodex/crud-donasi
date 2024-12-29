<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data contoh ke dalam tabel donations
        DB::table('donations')->insert([
            'title' => 'Donasi Pendidikan',
            'image' => 'donations/education.jpg', // Misalnya gambar ini sudah ada di storage
            'description' => 'Donasi untuk membantu pendidikan anak-anak di daerah terpencil.',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('donations')->insert([
            'title' => 'Donasi Kesehatan',
            'image' => 'donations/health.jpg', // Misalnya gambar ini sudah ada di storage
            'description' => 'Bantuan untuk pengobatan pasien dengan penyakit kritis.',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('donations')->insert([
            'title' => 'Bantuan Bencana Alam',
            'image' => 'donations/disaster.jpg', // Misalnya gambar ini sudah ada di storage
            'description' => 'Donasi untuk membantu korban bencana alam.',
            'status' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
