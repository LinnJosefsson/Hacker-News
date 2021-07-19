<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote()
    {
        $vote = Vote::count();
        return view('post.mostlikes')->with(['most' => $vote]);
    }
}
