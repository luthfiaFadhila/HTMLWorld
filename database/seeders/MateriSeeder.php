<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    public function run()
    {
        Materi::truncate();
        Materi::create([
            'judul' => 'Pengertian HTML dan Struktur Dasar HTML',
            'deskripsi' => 'Pengertian HTML dan Struktur Dasar HTML',
            'konten' => '
                <h2>MATERI 1 (PENGERTIAN HTML DAN PENGENALAN STRUKTUR DASAR HTML)</h2>
                <p>HTML (Hypertext Markup Language) adalah bahasa standar yang digunakan untuk membuat dan merancang halaman web. Dalam dunia web development, HTML berfungsi sebagai kerangka dasar yang mendefinisikan struktur dan isi dari sebuah halaman web. Sering kali orang-orang salah paham akan HTML sebagai bahasa pemrograman, padahal nyatanya HTML merupakan bahasa markup yaitu untuk menentukan struktur dan tataletak konten di halaman web, artinya HTML hanya menyediakan kerangka dari pembuatan sebuah website.</p>

                <h3>Struktur Dasar HTML</h3>
                <pre><code>&lt;!DOCTYPE html&gt;
        &lt;html lang="en"&gt;
        &lt;head&gt;
            &lt;meta charset="UTF-8"&gt;
            &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
            &lt;title&gt;Document&lt;/title&gt;
        &lt;/head&gt;
        &lt;body&gt;

        &lt;/body&gt;
        &lt;/html&gt;
        </code></pre>

                <p><strong>Struktur dasar HTML terdiri dari:</strong></p>
                <ul>
                    <li><code>&lt;!DOCTYPE html&gt;</code>: Ini memberi tahu browser bahwa dokumen ini menggunakan HTML5.</li>
                    <li><code>&lt;html&gt;</code>: Elemen root dari dokumen HTML.</li>
                    <li><code>&lt;head&gt;</code>: Bagian yang berisi informasi meta tentang dokumen, seperti judul dokumen.</li>
                    <li><code>&lt;title&gt;</code>: Ini adalah judul halaman yang ditampilkan pada tab browser.</li>
                    <li><code>&lt;body&gt;</code>: Bagian berisi konten yang akan ditampilkan di halaman web.</li>
                </ul>

                <h3>Penggunaan Elemen &lt;div&gt; untuk Mengelompokkan Konten</h3>
                <p>Selain elemen-elemen utama di atas, kita juga bisa menggunakan <code>&lt;div&gt;</code> untuk mengelompokkan beberapa elemen dalam satu wadah. <code>&lt;div&gt;</code> adalah elemen HTML tingkat blok yang tidak memiliki arti khusus, tetapi sangat berguna untuk mengorganisasi dan menata konten menggunakan CSS atau JavaScript.</p>

                <p><strong>Contoh penggunaan Elemen &lt;div&gt;:</strong></p>
                <pre><code>&lt;div&gt;
            &lt;h1&gt;Selamat Datang&lt;/h1&gt;
            &lt;p&gt;Ini adalah paragraf dalam div.&lt;/p&gt;
        &lt;/div&gt;
        </code></pre>
            '
        ]);


        Materi::create([
            'judul' => 'Elemen Teks pada HTML (Tag HTML)',
            'deskripsi' => 'Elemen Teks pada HTML (Tag HTML)',
            'konten' => '
                <h2>Elemen Teks dalam HTML</h2>
                <p>Elemen teks dalam HTML digunakan untuk menyusun dan menampilkan konten teks di halaman web. Elemen-elemen ini memungkinkan kamu untuk mengatur teks seperti heading, paragraf, daftar, dan lainnya.</p>

                <h3>Tag Heading</h3>
                <p>Tag heading digunakan untuk membuat judul. Terdapat enam tingkat heading:</p>
                <pre>
                &lt;h1&gt;Ini Heading 1&lt;/h1&gt;
                &lt;h2&gt;Ini Heading 2&lt;/h2&gt;
                &lt;h3&gt;Ini Heading 3&lt;/h3&gt;
                &lt;h4&gt;Ini Heading 4&lt;/h4&gt;
                &lt;h5&gt;Ini Heading 5&lt;/h5&gt;
                &lt;h6&gt;Ini Heading 6&lt;/h6&gt;
                </pre>

                <h3>Tag Paragraf</h3>
                <p>Tag &lt;p&gt; digunakan untuk membuat paragraf yang secara otomatis diberi jarak oleh browser agar teks lebih rapi dan mudah dibaca.</p>
                <pre>
                &lt;p&gt;Ini adalah contoh paragraf&lt;/p&gt;
                </pre>

                <h3>Tag Teks Tebal dan Miring</h3>
                <ul>
                    <li><strong>&lt;strong&gt;</strong>: Menekankan makna penting (tebal)</li>
                    <li><b>&lt;b&gt;</b>: Hanya untuk gaya visual tebal</li>
                    <li><em>&lt;em&gt;</em>: Penekanan makna dengan miring</li>
                    <li><i>&lt;i&gt;</i>: Gaya visual miring (contoh: istilah asing)</li>
                </ul>
                <pre>
                &lt;p&gt;&lt;strong&gt;Penting:&lt;/strong&gt; Selalu simpan cadangan data Anda.&lt;/p&gt;
                &lt;p&gt;&lt;b&gt;Diskon besar-besaran&lt;/b&gt; hanya hari ini!&lt;/p&gt;
                &lt;p&gt;&lt;em&gt;Segera&lt;/em&gt; daftarkan dirimu sebelum kuota habis.&lt;/p&gt;
                &lt;p&gt;Istilah &lt;i&gt;gratis&lt;/i&gt; sering menarik perhatian pengunjung.&lt;/p&gt;
                </pre>

                <h3>Tag Baris Baru dan Garis Horizontal</h3>
                <ul>
                    <li><code>&lt;br&gt;</code>: Untuk membuat baris baru</li>
                    <li><code>&lt;hr&gt;</code>: Untuk membuat garis horizontal</li>
                </ul>
                '
        ]);
        Materi::create([
                'judul' => 'Hyperlink, Navigasi, Gambar, dan Elemen Multimedia',
                'deskripsi' => 'Hyperlink, Navigasi, Gambar, dan Elemen Multimedia',
                'konten' => '
            <h2>Hyperlink dan Navigasi</h2>
            <p>Hyperlink dan navigasi adalah elemen penting dalam HTML yang memungkinkan pengguna untuk berpindah antar halaman web.</p>

            <h3>Tag &lt;a&gt; dan Atribut href</h3>
            <p>Tag &lt;a&gt; digunakan untuk membuat tautan. Atribut <code>href</code> menentukan tujuan tautan.</p>

            <pre>
            &lt;a href="https://www.tokopedia.com"&gt;Kunjungi Website Kami!&lt;/a&gt;
            </pre>

            <p>Tautan ke halaman lain di website yang sama:</p>
            <pre>
            &lt;a href="halaman2.html"&gt;Halaman 2&lt;/a&gt;
            </pre>

            <h2>Gambar dan Elemen Multimedia</h2>
            <p>Gambar dan media seperti video serta audio membuat tampilan halaman web lebih menarik dan interaktif.</p>

            <h3>Tag &lt;img&gt;, src, dan alt</h3>
            <p>Tag &lt;img&gt; digunakan untuk menampilkan gambar. Atribut <code>src</code> menentukan lokasi gambar, dan <code>alt</code> berisi deskripsi alternatif.</p>

            <pre>
            &lt;img src="gambar/logo.png" alt="Logo Website"&gt;
            </pre>

            <h3>Menambahkan Video dan Audio</h3>
            <ul>
                <li><code>&lt;video&gt;</code>: Menampilkan video</li>
                <li><code>&lt;audio&gt;</code>: Menampilkan audio</li>
            </ul>

            <p>Contoh penggunaan video dan audio:</p>
            <pre>
            &lt;video controls width="320" height="240"&gt;
            &lt;source src="video/sample.mp4" type="video/mp4"&gt;
            Browser tidak mendukung tag video.
            &lt;/video&gt;

            &lt;audio controls&gt;
            &lt;source src="audio/sample.mp3" type="audio/mpeg"&gt;
            Browser tidak mendukung tag audio.
            &lt;/audio&gt;
            </pre>
            '
        ]);
        Materi::create([
                'judul' => 'Elemen dan Daftar pada HTML',
                'deskripsi' => 'Elemen dan Daftar pada HTML',
                'konten' => '
            <h2>List atau Daftar dalam HTML</h2>
            <p>List atau daftar adalah cara efektif untuk menyusun informasi dalam format yang mudah dibaca. Dalam HTML, terdapat beberapa jenis daftar:</p>

            <h3>Unordered List (&lt;ul&gt;)</h3>
            <p>Digunakan untuk membuat daftar tidak berurutan. Tiap item ditandai dengan bullet.</p>
            <pre>
            &lt;ul&gt;
            &lt;li&gt>Apel&lt;/li&gt;
            &lt;li&gt>Pisang&lt;/li&gt;
            &lt;li&gt>Mangga&lt;/li&gt;
            &lt;/ul&gt;
            </pre>
            <p><strong>Tampilan:</strong></p>
            <ul>
            <li>Apel</li>
            <li>Pisang</li>
            <li>Mangga</li>
            </ul>

            <h3>Ordered List (&lt;ol&gt;)</h3>
            <p>Digunakan untuk daftar berurutan (nomor atau huruf).</p>
            <pre>
            &lt;ol&gt;
            &lt;li&gt>Bangun tidur&lt;/li&gt;
            &lt;li&gt>Sarapan&lt;/li&gt;
            &lt;li&gt>Berangkat sekolah&lt;/li&gt;
            &lt;/ol&gt;
            </pre>
            <p><strong>Tampilan:</strong></p>
            <ol>
            <li>Bangun tidur</li>
            <li>Sarapan</li>
            <li>Berangkat sekolah</li>
            </ol>

            <h3>Description List (&lt;dl&gt;)</h3>
            <p>Untuk menjelaskan istilah tertentu. Gunakan &lt;dt&gt; untuk istilah dan &lt;dd&gt; untuk deskripsinya.</p>
            <pre>
            &lt;dl&gt;
            &lt;dt&gt;HTML&lt;/dt&gt;
            &lt;dd&gt;Bahasa markup untuk membuat halaman web&lt;/dd&gt;

            &lt;dt&gt;CSS&lt;/dt&gt;
            &lt;dd&gt;Bahasa untuk mendesain tampilan halaman web&lt;/dd&gt;
            &lt;/dl&gt;
            </pre>
            <p><strong>Tampilan:</strong></p>
            <dl>
            <dt><strong>HTML</strong></dt>
            <dd>Bahasa markup untuk membuat halaman web</dd>
            <dt><strong>CSS</strong></dt>
            <dd>Bahasa untuk mendesain tampilan halaman web</dd>
            </dl>
            '
        ]);
        Materi::create([
            'judul' => 'Tabel dan Formulir dalam HTML',
            'deskripsi' => 'Tabel dan Formulir dalam HTML',
            'konten' => '
        <h2>Tabel dalam HTML</h2>
        <p>Tabel digunakan untuk menyusun data dalam baris dan kolom.</p>

        <h3>Struktur Dasar Tabel</h3>
        <pre>
        &lt;table border="1"&gt;
        &lt;tr&gt;
            &lt;th&gt;Nama&lt;/th&gt;
            &lt;th&gt>Usia&lt;/th&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;Rina&lt;/td&gt;
            &lt;td&gt;17&lt;/td&gt;
        &lt;/tr&gt;
        &lt;/table&gt;
        </pre>

        <p><strong>Hasil:</strong></p>
        <table border="1">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
        </tr>
        <tr>
            <td>Rina</td>
            <td>17</td>
        </tr>
        </table>

        <h3>Colspan dan Rowspan</h3>
        <pre>
        &lt;td colspan="2"&gt;Gabungan 2 kolom&lt;/td&gt;
        &lt;td rowspan="2"&gt;Gabungan 2 baris&lt;/td&gt;
        </pre>

        <hr>

        <h2>Formulir dalam HTML</h2>
        <p>Form digunakan untuk menerima input dari pengguna. Data bisa dikirim ke server melalui atribut <code>action</code>.</p>

        <h3>Contoh Formulir Sederhana</h3>
        <pre>
        &lt;form action="submit.php" method="post"&gt;
        Nama: &lt;input type="text" name="nama"&gt;&lt;br&gt;
        Password: &lt;input type="password" name="password"&gt;&lt;br&gt;
        Gender:
        &lt;input type="radio" name="gender" value="pria"&gt; Pria
        &lt;input type="radio" name="gender" value="wanita"&gt; Wanita&lt;br&gt;
        Hobi:
        &lt;input type="checkbox" name="hobi[]" value="membaca"&gt; Membaca
        &lt;input type="checkbox" name="hobi[]" value="olahraga"&gt; Olahraga&lt;br&gt;
        Negara:
        &lt;select name="negara"&gt;
            &lt;option&gt;Indonesia&lt;/option&gt;
            &lt;option&gt;Malaysia&lt;/option&gt;
        &lt;/select&gt;&lt;br&gt;
        &lt;button type="submit"&gt;Kirim&lt;/button&gt;
        &lt;/form&gt;
        </pre>

        <h3>Atribut Umum pada Elemen</h3>
        <ul>
        <li><strong>id</strong>: ID unik elemen</li>
        <li><strong>class</strong>: Kelas untuk styling CSS</li>
        <li><strong>style</strong>: CSS langsung di tag</li>
        <li><strong>title</strong>: Tooltip saat di-hover</li>
        </ul>
        '
        ]);
    }
}
