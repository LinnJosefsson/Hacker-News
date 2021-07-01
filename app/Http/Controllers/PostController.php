<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'message' => 'required:string',
            'title' => 'required:string',
        ]);
        $post = Post::findOrFail($request->get('id'));
        $post->message = $request->get('message');
        $post->title = $request->get('title');
        $post->save();

        return redirect('post');
    }

    public function store(Request $request)
    {
        /* $user = User::findOrFail($id); */ //find or throw error
        $request->validate([
            'message' => 'required:string',
            'title' => 'required:string',
        ]);
        $post = new Post();
        $id = Auth::id();
        $post->message = $request->get('message');
        $post->title = $request->get('title');
        $post->user_id = $id; //skickar till tabellen
        $post->save();

        return redirect('post');
    }
}
