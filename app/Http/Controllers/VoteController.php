<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function store(Post $post)
    {
        $user = Auth::user();
        if ($post->postVotedBy($user)) {
            return response(null, 409);
        }

        $post->vote()->create([
            'user_id' => $user->id,
        ]);

        return back();
    }
    public function destroy(Post $post)
    {
        $user = Auth::user();
        $user->vote()->where('post_id', $post->id)->delete(); //sad

        return back();
    }

    public function topVotes()
    {
        $posts = Post::withCount('vote')->orderBy('vote_count', 'desc')->get();

        return view('post.mostlikes', ['posts' => $posts]);
    }
}
