@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #F0F4FF;
    }

    .about-wrapper {
        max-width: 700px;
        margin: 60px auto 40px; /* tambahkan margin top agar tidak tertutup tombol */
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        position: relative;
    }

    h2 {
        text-align: center;
        color: #023e8a;
        margin-bottom: 30px;
    }

    .tab-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .tab-buttons button {
        flex: 1;
        padding: 12px;
        border: none;
        background: #578FCA;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .tab-buttons button.active {
        background: #023e8a;
    }

    .tab-content {
        background: #e0f7fa;
        padding: 20px;
        border-radius: 10px;
        font-size: 16px;
        line-height: 1.6;
    }

    
    .grid-pengembang {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }

    .pengembang-card {
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        text-align: center;
    }
    .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

    .back-button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #0077b6;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s;
        font-weight: bold;
    }

    .back-button:hover {
        background-color: #023e8a;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="top-bar">
<a href="{{ route('home') }}" class="back-button"> <i class="bi bi-house-fill"></i></a>
</div>

<div class="about-wrapper">
    <h2>🧭 TENTANG</h2>

    <!-- Tombol Tab -->
    <div class="tab-buttons">
        <button id="btnGame" class="active" onclick="showTab('game')">Game</button>
        <button id="btnDev" onclick="showTab('dev')">Pengembang</button>
    </div>

    <!-- Isi Tab: Game -->
    <div id="tabGame" class="tab-content">
        <h3>📘 Tentang Game</h3>
        <p>
            Game edukatif <strong>“HTML World”</strong> dirancang untuk membantu siswa memahami dasar-dasar HTML dengan cara menyenangkan.
            Game ini memiliki level, soal interaktif, nyawa ❤️, waktu ⏱️, skor ⭐, dan evaluasi live untuk pembelajaran real-time.
        </p>
    </div>

    <!-- Isi Tab: Pengembang -->
    <div id="tabDev" class="tab-content" style="display: none;">
        <h3>📚 Pengembang</h3>
        <div class="grid-pengembang">
            @foreach ([
                ['nama' => 'Amanda Putri', 'nim' => '2310131220007'],
                ['nama' => 'Luthfia Fadhila', 'nim' => '2310131220014'],
                ['nama' => 'Dita Handayani', 'nim' => '2310131220010']
            ] as $dev)
                <div class="pengembang-card">
                    <h4>{{ $dev['nama'] }}</h4>
                    <p>{{ $dev['nim'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function showTab(tab) {
        const gameTab = document.getElementById('tabGame');
        const devTab = document.getElementById('tabDev');
        const btnGame = document.getElementById('btnGame');
        const btnDev = document.getElementById('btnDev');

        if (tab === 'game') {
            gameTab.style.display = 'block';
            devTab.style.display = 'none';
            btnGame.classList.add('active');
            btnDev.classList.remove('active');
        } else {
            gameTab.style.display = 'none';
            devTab.style.display = 'block';
            btnDev.classList.add('active');
            btnGame.classList.remove('active');
        }
    }
</script>

@endsection
