<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    // ✅ Halaman pilihan level
    public function showLevelPage()
    {
        $levels = Level::all();
        $user = Auth::user()->load('progress');
        return view('game.levels', compact('levels', 'user'));
    }

    // ✅ Halaman intro cerita level
    public function showIntro($id)
    {
        $level = Level::findOrFail($id);
        return view('game.intro', compact('level'));
    }

    // ✅ Halaman main level
    public function showLevel($id)
    {
        $level = Level::findOrFail($id);
        $user = Auth::user();

        $progress = $user->progress()->firstOrCreate(
            ['level_id' => $id],
            ['lives' => 3, 'score' => 0, 'attempts' => 0, 'is_passed' => false]
        );

        return view('game.level', compact('level', 'progress'));
    }

    // ✅ Cek akses ke level
    public function level($id)
    {
        $level = Level::findOrFail($id);
        $user = Auth::user();

        if ($id > 1) {
            $prev = UserProgress::where('user_id', $user->id)
                ->where('level_id', $id - 1)
                ->where('is_passed', true)
                ->first();

            if (!$prev) {
                return redirect()->route('level.pilih')->with('error', 'Selesaikan level sebelumnya terlebih dahulu!');
            }
        }

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id, 'level_id' => $id],
            ['lives' => 3, 'score' => 0, 'attempts' => 0, 'is_passed' => false]
        );

        return view('game.level', compact('level', 'progress'));
    }

    // ✅ Submit jawaban
    public function submit(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $user = Auth::user();
        $answer = trim($request->input('answer'));
        $timeUsed = $request->input('time_used', 0);

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id, 'level_id' => $id],
            ['lives' => 3, 'score' => 0, 'attempts' => 0, 'is_passed' => false]
        );

        if ($progress->is_passed) {
            return response()->json([
                'status' => 'done',
                'message' => 'Kamu sudah menyelesaikan level ini.',
            ]);
        }

        $progress->increment('attempts');

        if (strlen(strip_tags($answer)) < 10) {
            $progress->decrement('lives');

            if ($progress->lives <= 0) {
                return response()->json([
                    'status' => 'gameover',
                    'retry_url' => route('game.reset', $id),
                    'back_url' => route('level.pilih'),
                ]);
            }

            return response()->json([
                'status' => 'wrong',
                'message' => 'Jawaban terlalu singkat atau tidak masuk akal. Sisa nyawa: ' . $progress->lives,
            ]);
        }

        // Cek struktur HTML untuk level 1
        if ($id == 1 && $this->isValidHtmlStructure($answer)) {
            $score = $this->calculateScore($progress->lives, $timeUsed);
            $progress->update([
                'is_passed' => true,
                'score' => $score,
            ]);

            return response()->json([
                'status' => 'correct',
                'message' => 'Struktur HTML valid!',
                'next_level' => route('game.intro', $id + 1),
            ]);
        }

        // Validasi jawaban
        $cleanUser = strtolower(preg_replace('/\s+/', '', strip_tags($answer)));
        $expected = strtolower(preg_replace('/\s+/', '', strip_tags($level->correct_answer)));

        if ($cleanUser === $expected) {
            $score = $this->calculateScore($progress->lives, $timeUsed);
            $progress->update([
                'is_passed' => true,
                'score' => $score,
            ]);

            return response()->json([
                'status' => 'correct',
                'message' => 'Jawaban benar!',
                'next_level' => route('game.intro', $id + 1),
            ]);
        } else {
            $progress->decrement('lives');

            if ($progress->lives <= 0) {
                return response()->json([
                    'status' => 'gameover',
                    'retry_url' => route('game.reset', $id),
                    'back_url' => route('level.pilih'),
                ]);
            }

            return response()->json([
                'status' => 'wrong',
                'message' => 'Jawaban salah. Sisa nyawa: ' . $progress->lives,
            ]);
        }
    }

    // ✅ Perhitungan skor
    private function calculateScore($lives, $timeUsed)
    {
        $baseScore = 100;
        $bonusLives = $lives * 10;
        $bonusTime = max(0, 60 - $timeUsed); // maksimal 60 detik, bonus jika cepat
        return $baseScore + $bonusLives + $bonusTime;
    }

    // ✅ Reset level
    public function resetLevel($id)
    {
        $user = Auth::user();

        UserProgress::where('user_id', $user->id)
            ->where('level_id', $id)
            ->delete();

        UserProgress::create([
            'user_id' => $user->id,
            'level_id' => $id,
            'lives' => 3,
            'score' => 0,
            'attempts' => 0,
            'is_passed' => false,
        ]);

        return redirect()->route('game.level', ['id' => $id]);
    }

    // ✅ Reset dan kembali ke daftar level
    public function resetAndBack($id)
    {
        $user = Auth::user();

        UserProgress::where('user_id', $user->id)
            ->where('level_id', $id)
            ->delete();

        UserProgress::create([
            'user_id' => $user->id,
            'level_id' => $id,
            'lives' => 3,
            'score' => 0,
            'attempts' => 0,
            'is_passed' => false,
        ]);

        return redirect()->route('level.pilih');
    }

    // ✅ Leaderboard
    public function leaderboard()
    {
        $scores = UserProgress::where('is_passed', true)
            ->select('user_id', \DB::raw('SUM(score) as total_score'))
            ->groupBy('user_id')
            ->orderByDesc('total_score')
            ->with('user')
            ->get();

        return view('game.leaderboard', compact('scores'));
    }

    // ✅ Validasi struktur HTML level 1
    private function isValidHtmlStructure($html)
    {
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        $htmlTag = $dom->getElementsByTagName('html')->item(0);
        $headTag = $dom->getElementsByTagName('head')->item(0);
        $bodyTag = $dom->getElementsByTagName('body')->item(0);
        return $htmlTag && $headTag && $bodyTag;
    }
}
