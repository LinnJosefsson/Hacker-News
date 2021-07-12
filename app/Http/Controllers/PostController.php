<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();

        if ($posts !== NULL) {
            return view('post.index', ['posts' => $posts]);
        }
        return redirect('/index')->withErrors('Whoops! Please try something else.');
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
            'link' => 'nullable|string',
        ]);
        $post = new Post();
        $id = Auth::id();
        //skickar till table:
        $post->message = $request->get('message');
        $post->title = $request->get('title');
        $post->link = $request->get('link');
        $post->user_id = $id;
        $post->save();

        return redirect('post');
    }

    public function destroy(Post $post)
    {
        /* $id = Auth::id(); */

        /* $this->authorize('delete', $post); */

        $post->delete();

        return redirect('post'); ////????????
    }
}
/*     public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('post.index');
    } */
