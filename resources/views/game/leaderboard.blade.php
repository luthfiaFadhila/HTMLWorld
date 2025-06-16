@extends('layouts.app')

@section('content')
<style>
    .top-bar {
        padding: 20px;
    }

    .back-button {
        display: inline-block;
        padding: 10px 20px;
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

    .leaderboard-wrapper {
        max-width: 700px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .leaderboard-wrapper h2 {
        text-align: center;
        color: #023e8a;
        margin-bottom: 25px;
    }

    table.leaderboard {
        width: 100%;
        border-collapse: collapse;
    }

    table.leaderboard th,
    table.leaderboard td {
        padding: 12px 15px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    table.leaderboard th {
        background-color: #00b4d8;
        color: white;
        font-weight: bold;
    }

    table.leaderboard tr:nth-child(even) {
        background-color: #f1faff;
    }

    .medal {
        font-size: 18px;
        margin-right: 5px;
    }

    .gold { color: gold; }
    .silver { color: silver; }
    .bronze { color: #cd7f32; }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="top-bar">
    <a href="{{ route('home') }}" class="back-button"> <i class="bi bi-house-fill"></i></a>
</a>
</div>

<div class="leaderboard-wrapper">
    <h2>🏆 Leaderboard</h2>
    <table class="leaderboard">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Institusi</th>
                <th>Total Skor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($scores as $index => $entry)
                <tr>
                    <td>
                        @if($index == 0)
                            <span class="medal gold">🥇</span>
                        @elseif($index == 1)
                            <span class="medal silver">🥈</span>
                        @elseif($index == 2)
                            <span class="medal bronze">🥉</span>
                        @else
                            {{ $index + 1 }}
                        @endif
                    </td>
                    <td>{{ $entry->user->username ?? 'N/A' }}</td>
                    <td>{{ $entry->user->kelas ?? '-' }}</td>
                    <td>{{ $entry->user->institusi ?? '-' }}</td>
                    <td>{{ $entry->total_score }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data leaderboard.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
