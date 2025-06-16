@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Tombol kembali floating -->
<a href="{{ route('level.pilih') }}" class="floating-card">
   <i class="bi bi-arrow-left-circle-fill"></i>
</a>

<div class="container chat-page">

    <div class="level-header">
        <h3>Level {{ $level->id }} - {{ $level->title }}</h3>
        <p class="narration"><em>{{ $level->narration }}</em></p>
    </div>

    <div class="chatbox" id="chatbox" data-chats='@json(json_decode($level->story))'></div>

    <p class="info-text"><em>Tekan <strong>Enter</strong> untuk lanjut...</em></p>

    <div class="next-button-container" id="next-button-container" style="display: none;">
        <a href="{{ route('game.level', $level->id) }}">
            <button class="next-button">Lanjut ke Soal</button>
        </a>
    </div>
</div>

<style>
    body {
        background: linear-gradient(to bottom, #caf0f8, #ade8f4);
        font-size: 13px;
        margin: 0;
        padding: 0;
    }

    .chat-page {
        max-width: 700px;
        margin: auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, sans-serif;
        position: relative;
    }

    .floating-card {
        position: fixed;
        top: 20px;
        left: 20px;
        background-color: #00b4d8;
        color: white;
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        transition: background-color 0.3s ease;
    }

    .floating-card:hover {
        background-color: #0077b6;
        text-decoration: none;
    }

    .floating-card i {
        font-size: 16px;
    }

    h3 {
        color: #023e8a;
        margin-bottom: 8px;
        font-size: 18px;
    }

    .narration {
        font-size: 13px;
        color: #333;
        background: #d6f5ff;
        padding: 10px;
        border-radius: 8px;
        border-left: 4px solid #00b4d8;
    }

    .chatbox {
        margin: 20px 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
        min-height: 180px;
    }

    .chat-message {
        display: flex;
        flex-direction: column;
        max-width: 70%;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.3s forwards;
        font-size: 13px;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .chat-message.left {
        align-self: flex-start;
    }

    .chat-message.right {
        align-self: flex-end;
        text-align: right;
    }

    .sender-name {
        font-size: 11px;
        color: #666;
        margin-bottom: 2px;
    }

    .message-bubble {
        padding: 10px 14px;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        word-wrap: break-word;
    }

    .chat-message.right .message-bubble {
        background: #90e0ef;
    }

    .next-button-container {
        text-align: center;
        margin-top: 25px;
    }

    .next-button {
        padding: 8px 20px;
        background: #0077b6;
        border: none;
        border-radius: 6px;
        color: #fff;
        font-size: 13px;
        cursor: pointer;
    }

    .next-button:hover {
        background: #023e8a;
    }

    .info-text {
        text-align: center;
        font-size: 12px;
        color: #555;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chatbox = document.getElementById('chatbox');
        const chats = JSON.parse(chatbox.dataset.chats);
        const nextBtn = document.getElementById('next-button-container');
        let i = 0;

        function renderChat(chat) {
            const div = document.createElement('div');
            div.className = 'chat-message ' + (chat.sender === 'player' ? 'right' : 'left');

            const sender = document.createElement('div');
            sender.className = 'sender-name';
            sender.textContent = chat.sender === 'player' ? 'Kamu' : '📘 Buku Ajaib';

            const bubble = document.createElement('div');
            bubble.className = 'message-bubble';
            bubble.textContent = chat.message;

            div.appendChild(sender);
            div.appendChild(bubble);
            chatbox.appendChild(div);
            chatbox.scrollTop = chatbox.scrollHeight;
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                if (i < chats.length) {
                    renderChat(chats[i]);
                    i++;
                    if (i === chats.length) nextBtn.style.display = 'block';
                }
            }
        });
    });
</script>
@endsection
