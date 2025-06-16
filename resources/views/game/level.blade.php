@extends('layouts.app')

@section('content')

<style>
    .game-wrapper {
        max-width: 800px;
        margin: 30px auto;
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .top-bar h2 {
        margin: 0;
        font-size: 20px;
        color: #023e8a;
        flex-grow: 1;
        text-align: center;
    }

    .back-button {
        background-color: #00B894;
        color: white;
        text-decoration: none;
        font-weight: bold;
        padding: 8px 15px;
        border-radius: 8px;
        white-space: nowrap;
    }

    .lives {
        font-size: 18px;
        color: red;
    }

    .content-grid {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .box {
        flex: 1;
        background-color: #e0f7fa;
        padding: 15px;
        border-radius: 10px;
        min-height: 150px;
    }

    .textarea-box {
        background-color: #e0f7fa;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
    }

    textarea {
        width: 100%;
        height: 120px;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-family: monospace;
        font-size: 14px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .button-group button {
        padding: 10px 25px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        background-color: #0077b6;
        color: white;
        transition: background 0.2s;
    }

    .button-group button:hover {
        background-color: #023e8a;
    }

    .timer {
        font-weight: bold;
        font-size: 16px;
        color: #d00000;
    }

    #outputContent iframe {
        width: 100%;
        height: 100px;
        border: 1px solid #ccc;
        margin-top: 10px;
        border-radius: 5px;
    }

    .hint-box {
        background-color: #fff3cd;
        padding: 12px;
        border-left: 5px solid #ffdd57;
        border-radius: 5px;
        margin-top: 15px;
    }

    #gameOverModal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        align-items: center;
        justify-content: center;
    }

    #gameOverModal .modal-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
    }

    #gameOverModal button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    #retryBtn {
        background-color: #0077b6;
        color: white;
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

<div class="back-bar">
<a href="{{ route('game.reset.back', $level->id) }}" class="back-button"><i class="bi bi-arrow-left-circle-fill"></i></a>
</div>

<div class="game-wrapper">
    <div class="top-bar">
        <div class="timer">⏱️ <span id="countdown">05:00</span></div>
        <h2>Level {{ $level->id }}</h2>
        <div class="lives">
            @for ($i = 0; $i < 3; $i++)
                {!! $i < $progress->lives ? '❤️' : '🤍' !!}
            @endfor
        </div>
    </div>

    <div class="content-grid">
        <div class="box">
            <strong>📝 Soal:</strong>
            <pre style="white-space: pre-wrap; word-wrap: break-word;">{!! nl2br(e($level->question)) !!}</pre>
        </div>
        <div class="box">
            <strong>Output:</strong>
            <div id="outputContent" style="margin-top: 10px; background: #fff; padding: 10px; border-radius: 6px; min-height: 60px;">
                <em>Output akan muncul di sini...</em>
            </div>
        </div>
    </div>

    @if ($progress->attempts >= 2 && $level->hint)
        <div class="hint-box">
            <strong>💡 Hint:</strong> {!! $level->hint !!}
        </div>
    @endif

    <form id="gameForm">
        @csrf
        <div class="textarea-box">
            <label><strong>✍️ Tuliskan Jawaban Anda:</strong></label>
            <textarea id="liveAnswer" name="answer" placeholder="Tulis kode HTML di sini..."></textarea>
        </div>
        <div class="button-group">
            <button type="submit">Submit</button>
            <button type="reset" style="background-color: #ccc; color: black;">Reset</button>
        </div>
    </form>
</div>

<div id="gameOverModal">
    <div class="modal-content">
        <h3 style="color: red;">💀 Game Over!</h3>
        <p>Nyawa habis. Mau mengulang level ini?</p>
        <button id="retryBtn">🔁 Ulangi</button>
        <button id="backBtn">↩️ Kembali</button>
    </div>
</div>

<script>
    let startTime = Date.now();
    document.addEventListener('DOMContentLoaded', function () {
        let duration = 300;
        const countdownEl = document.getElementById('countdown');

        function updateCountdown() {
            const minutes = Math.floor(duration / 60);
            const seconds = duration % 60;
            countdownEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            if (duration === 0) {
                showGameOver("{{ route('game.reset', $level->id) }}", "{{ route('level.pilih') }}");
            } else {
                duration--;
            }
        }

        setInterval(updateCountdown, 1000);
    });

    function showGameOver(retryUrl, backUrl) {
        const modal = document.getElementById('gameOverModal');
        modal.style.display = 'flex';
        document.getElementById('retryBtn').onclick = function () {
            window.location.href = retryUrl;
        };
        document.getElementById('backBtn').onclick = function () {
            window.location.href = backUrl;
        };
    }

    const textarea = document.getElementById("liveAnswer");
    const outputContent = document.getElementById("outputContent");
    const expected = `{!! strtolower(preg_replace('/\\s+/', '', strip_tags($level->correct_answer))) !!}`.replace(/&lt;/g, '<').replace(/&gt;/g, '>');

    textarea.addEventListener("input", () => {
        const html = textarea.value.trim();
        if (!html) {
            outputContent.innerHTML = "<em>Output akan muncul di sini...</em>";
            return;
        }

        const iframe = document.createElement("iframe");
        iframe.srcdoc = html;
        iframe.style.width = "100%";
        iframe.style.height = "100px";
        iframe.style.border = "1px solid #ccc";
        iframe.style.borderRadius = "5px";

        outputContent.innerHTML = "";
        outputContent.appendChild(iframe);

        const user = html.toLowerCase().replace(/\s+/g, '').replace(/</g, '').replace(/>/g, '');
        const cleanExpected = expected.toLowerCase().replace(/\s+/g, '').replace(/</g, '').replace(/>/g, '');

        if (user.includes(cleanExpected)) {
            outputContent.insertAdjacentHTML("beforeend", `<p style="color: green; font-weight: bold;">✅ Struktur sudah benar!</p>`);
        } else {
            outputContent.insertAdjacentHTML("beforeend", `<p style="color: orange;">🧐 Masih belum sesuai jawaban yang benar.</p>`);
        }
    });

    document.getElementById('gameForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const token = document.querySelector('input[name="_token"]').value;
        const answer = textarea.value;
        const elapsedTime = Math.floor((Date.now() - startTime) / 1000);

        fetch("{{ route('game.submit', $level->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ answer, time_used: elapsedTime })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'gameover') {
                showGameOver(data.retry_url, data.back_url);
            } else if (data.status === 'correct') {
                alert(data.message);
                window.location.href = data.next_level;
            } else {
                alert(data.message);
                location.reload();
            }
        })
        .catch(err => console.error(err));
    });
</script>

@endsection
