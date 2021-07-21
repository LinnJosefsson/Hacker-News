<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{

    public function store(Vote $vote, Request $request)
    {
        $vote->create([
            "user_id" => Auth::user()->id,

        ]);

        $vote->save();
        return back();
    }

    public function __invoke()
    {
        /* $vote = Vote::count();
        return view('post.mostlikes')->with(['most' => $vote]); */
    }
}
