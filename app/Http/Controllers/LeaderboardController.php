<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LeaderboardController extends Controller
{
  use App\Models\UserProgress; // tambahkan ini jika belum

public function leaderboard()
{
    $scores = UserProgress::where('is_passed', true)
        ->select('user_id', \DB::raw('SUM(score) as total_score'))
        ->groupBy('user_id')
        ->orderByDesc('total_score')
        ->with('user') // ini memuat seluruh data user
        ->get();

    return view('game.leaderboard', compact('scores'));
}

}
