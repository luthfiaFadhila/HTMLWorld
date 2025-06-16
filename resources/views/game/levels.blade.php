@extends('layouts.app')

@section('content')

@php
    $user = Auth::user();
@endphp

<style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: linear-gradient(to bottom, #f0f4ff, #d6ecff);
        color: #333;
        margin: 0;
        padding: 0;
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

    h2 {
        text-align: center;
        font-size: 28px;
        margin-top: -30px;
    }

    .level-list {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .level-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        border-radius: 12px;
        margin-bottom: 15px;
        padding: 12px 20px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .level-item:hover {
        transform: scale(1.01);
    }

    .level-icon {
        font-size: 36px;
        margin-right: 15px;
    }

    .level-content {
        flex-grow: 1;
        display: flex;
        align-items: center;
    }

    .level-title {
        font-size: 18px;
        font-weight: bold;
    }

    .level-link {
        text-decoration: none;
        color: white;
        background-color: #00b894;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        transition: background 0.2s;
    }

    .level-link:hover {
        background-color: #019875;
    }

    .locked {
        background-color: #ccc !important;
        cursor: not-allowed;
    }

    .locked:hover {
        background-color: #ccc !important;
    }

    .lock-icon {
        margin-left: 10px;
        font-size: 18px;
        color: #666;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="top-bar">
<a href="{{ route('home') }}" class="back-button"> <i class="bi bi-house-fill"></i></a>
</div>

<h2>Pilih Level</h2>

<div class="level-list">
    @foreach ($levels as $level)
        @php
            $canAccess = $level->id === 1 || $user->progress->where('level_id', $level->id - 1)->where('is_passed', true)->first();
        @endphp

        <div class="level-item">
            <div class="level-content">
                <div class="level-icon">{{ $canAccess ? '🧠' : '🔒' }}</div>
                <div class="level-title">
                    Level {{ $level->id }} - {{ $level->title }}
                </div>
            </div>

            @if ($canAccess)
                <a href="{{ route('game.intro', $level->id) }}" class="level-link">Main</a>
            @else
                <div class="level-link locked">Terkunci <span class="lock-icon">🔒</span></div>
            @endif
        </div>
    @endforeach
</div>

@endsection
