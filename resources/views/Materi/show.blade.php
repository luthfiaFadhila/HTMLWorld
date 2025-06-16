@extends('layouts.app')

@section('content')

<div style="max-width:700px;margin:auto;padding:20px">
    <h2>Level {{ $materi->id }} - {{ $materi->judul }}</h2>
    <p><em>{{ $materi->deskripsi }}</em></p>
    <div>{!! $materi->konten !!}</div>
    <br>
    <a href="{{ route('materi.index') }}" style="color:#0984e3;">← Kembali ke daftar materi</a>
</div>

@endsection
