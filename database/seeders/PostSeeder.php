<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'image' => 'posts/education.jpg', // Misalnya gambar ini sudah ada di storage
            'caption' => 'Donasi untuk membantu pendidikan anak-anak di daerah terpencil.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'image' => 'posts/health.jpg', // Misalnya gambar ini sudah ada di storage
            'caption' => 'Bantuan untuk pengobatan pasien dengan penyakit kritis.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'image' => 'posts/disaster.jpg', // Misalnya gambar ini sudah ada di storage
            'caption' => 'Donasi untuk membantu korban bencana alam.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
