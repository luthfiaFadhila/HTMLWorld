<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run()
    {
        // LEVEL 1
        DB::table('levels')->insert([
            'title' => 'Dasar HTML',
            'narration' => 'Suasana hening. Kamu membuka mata dan mendapati dirimu berada di ruang putih kosong tak berujung. Tidak ada dinding, tidak ada langit, hanya kekosongan. Di depanmu, sebuah buku melayang perlahan, terbuka dengan satu kata besar: <html>.',
            'story' => json_encode([
                ['sender' => 'npc', 'message' => 'Akhirnya... ada seseorang di sini.'],
                ['sender' => 'player', 'message' => 'Apa ini? Di mana aku?'],
                ['sender' => 'npc', 'message' => 'Kau berada di Dunia HTML. Dunia ini kosong... karena kodenya belum lengkap.'],
                ['sender' => 'player', 'message' => 'Kode? HTML? Apa maksudmu?'],
                ['sender' => 'npc', 'message' => 'Setiap dunia dibangun dari struktur HTML. Tanpa itu, tempat ini hanya kekosongan.'],
                ['sender' => 'npc', 'message' => 'Tugasmu sederhana. Lengkapi struktur dasar HTML agar dunia ini bisa mulai terbentuk.'],
                ['sender' => 'player', 'message' => 'Baiklah... aku akan mencoba.']
            ]),
            'question' => '➤ Ketik struktur HTML dasar yang terdiri dari tag <html>, <head>, dan <body>.',
            'correct_answer' => '<html><head><title>Judul Halaman</title></head><body>Halo Dunia</body></html>',
            'hint' => 'Gunakan struktur dasar: <html> <head> dan <body> Setiap tag harus dibuka dan ditutup dengan benar.'
        ]);

        // LEVEL 2
        DB::table('levels')->insert([
            'title' => 'Tag Konten HTML',
            'narration' => 'Setelah struktur terbentuk, dunia mulai muncul, tapi masih kosong. Kamu merasa perlu menambahkan konten.',
            'story' => json_encode([
                ['sender' => 'npc', 'message' => 'Lihat sekeliling. Dunia ini kosong tanpa konten.'],
                ['sender' => 'npc', 'message' => 'Gunakan tag <h1> <p> dan <a> untuk mengisi dunia ini.'],
                ['sender' => 'player', 'message' => 'Baik, aku akan coba menulis konten HTML.']
            ]),
            'question' => '➤ Tulis contoh tag <h1> <p> dan <a> dengan isi yang sesuai.',
            'correct_answer' => '<h1>Selamat Datang</h1><p>Ini adalah paragraf pertama saya.</p><a href="https://www.google.com">Kunjungi Google</a>',
            'hint' => 'Pastikan setiap tag ditutup dengan benar. Gunakan atribut href di tag <a>, dan isi teks di dalamnya.'
        ]);

        // LEVEL 3
        DB::table('levels')->insert([
            'title' => 'Layout dan Gambar',
            'narration' => 'Dunia terlihat datar dan tanpa warna. Tiba-tiba muncul permintaan untuk menambahkan gambar dan layout.',
            'story' => json_encode([
                ['sender' => 'npc', 'message' => 'Tempat ini butuh gambar dan susunan visual.'],
                ['sender' => 'npc', 'message' => 'Gunakan <div> <img> dan <br> untuk membuat tampilan lebih hidup.']
            ]),
            'question' => '➤ Tampilkan teks dan gambar menggunakan <div> <img> dan <br>',
            'correct_answer' => '<div><p>Ini dunia HTML yang hidup!</p><img src="https://via.placeholder.com/150" alt="Gambar contoh"><br></div>',
            'hint' => 'Tag <img> butuh atribut src dan alt. Letakkan semua elemen di dalam <div>. Tambahkan <br> jika perlu baris baru.'
        ]);

        // LEVEL 4
        DB::table('levels')->insert([
            'title' => 'Perbaiki Kode Rusak',
            'narration' => 'Tiba-tiba, dunia menjadi kacau. Kode-kode salah muncul dan mengganggu tampilan.',
            'story' => json_encode([
                ['sender' => 'npc', 'message' => 'HTML-mu rusak. Dunia mulai retak.'],
                ['sender' => 'npc', 'message' => 'Perbaiki kode berikut ini agar dunia stabil kembali.']
            ]),
            'question' => '➤ Perbaiki kode HTML berikut:<br><code><html><head><title><title></head><body><h1>Selamat Datang<p>Ini paragraf</body></html></code>',
            'correct_answer' => '<html><head><title>Oops</title></head><body><h1>Selamat Datang</h1><p>Ini paragraf</p></body></html>',
            'hint' => 'Perhatikan penutupan tag seperti <title> <h1> dan <p> Semua tag harus dibuka dan ditutup sesuai urutan.'
        ]);

        // LEVEL 5
        DB::table('levels')->insert([
            'title' => 'Tombol Interaktif',
            'narration' => 'Sebuah portal besar muncul, tapi tampaknya tidak aktif. Kamu melihat tanda: "Aktifkan tombol".',
            'story' => json_encode([
                ['sender' => 'npc', 'message' => 'Kamu butuh tombol untuk mengaktifkan portal.'],
                ['sender' => 'npc', 'message' => 'Gunakan event onclick pada tombol HTML.']
            ]),
            'question' => '➤ Buat tag <button> dengan event onclick yang memunculkan pesan "Portal Terbuka!" saat diklik.',
            'correct_answer' => '<button onclick="alert(\'Portal Terbuka!\')">Buka Portal</button>',
            'hint' => 'Gunakan onclick sebagai atribut di <button>, lalu tulis perintah JavaScript alert di dalamnya.'
        ]);
    }
}
