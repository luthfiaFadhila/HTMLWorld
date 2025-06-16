@extends('layouts.app')

@section('content')

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

    .materi-item {
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

    .materi-item:hover {
        transform: scale(1.01);
    }

    .materi-icon {
        font-size: 36px;
        margin-right: 15px;
    }

    .materi-content {
        flex-grow: 1;
        display: flex;
        align-items: center;
    }

    .materi-title {
        font-size: 18px;
        font-weight: bold;
    }

    .materi-link {
        text-decoration: none;
        color: white;
        background-color: #00b894;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        transition: background 0.2s;
    }

    .materi-link:hover {
        background-color: #019875;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="top-bar">
<a href="{{ route('home') }}" class="back-button"> <i class="bi bi-house-fill"></i></a>
</div>

<h2 style="text-align:center">Daftar Materi</h2>

<div class="materi-list" style="max-width:600px;margin:0 auto;padding:20px;">
   @foreach ($materis as $materi)
    <div class="materi-item" style="display:flex;justify-content:space-between;align-items:center;background:#fff;margin-bottom:15px;padding:12px 20px;border-radius:12px;box-shadow:0 3px 8px rgba(0,0,0,0.1);">
        <div class="materi-content" style="display:flex;align-items:center;">
            <div class="materi-icon" style="font-size:32px;margin-right:15px;">📘</div>
            <div class="materi-title" style="font-size:18px;font-weight:bold;">
                Materi {{ $materi->id }} - {{ $materi->judul }}
            </div>
        </div>
        <a href="{{ route('materi.detail', $materi->id) }}" class="materi-link" style="text-decoration:none;color:white;background:#0984e3;padding:10px 20px;border-radius:8px;font-weight:bold;">Buka</a>
    </div>
   @endforeach
</div>

@endsection
