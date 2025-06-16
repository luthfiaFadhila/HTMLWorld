<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Routing\Controller;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::orderBy('skor', 'desc')->get();
        return view('game.leaderboard', compact('scores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'institusi' => 'required',
            'skor' => 'required|integer',
        ]);

        Score::create($request->all());

        return redirect()->route('game.leaderboard')->with('success', 'Skor berhasil disimpan!');
    }
}