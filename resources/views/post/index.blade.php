
@extends('layout.mainlayout')

@section('content')

<div class="container">
<div class="post">
@foreach ($posts as $post)
{{-- <img src="{{ asset($post->user->image) }}"> --}}
<h2>{{ $post->title }} </h2>
<p>Posted by <b>{{ $post->user->name }}</b></p>
<p>{{$post->created_at}}</p>
 <p> {{ $post->message }}</p>
 <a href="//{{ $post->link }}" target="_blank">{{ $post->link }}</a>
 <br>

 @if ($post->postVotedBy(auth()->user()))
<form action="{{ route('posts.dislike', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>unlike</button>
</form>
 @else
 <form action="{{ url('posts/like', $post) }}" method="post">
    @csrf
<button><img src="{{ asset('storage/heart.png') }}"></button>

</form>
@endif
<p>{{ $post->vote->count() }} Likes</p>
 <br>


 <div>
     @comments(['model' => $post])

 @if (Auth::user() && (Auth::user()->id == $post->user_id))
    <form action="{{ url('posts.edit', $post) }}" method="post">
                @csrf
                <button type="submit"><a href="post/{{ $post->id }}/edit">Edit Post</a></button>
            </form>
@endif

@if (Auth::user() && (Auth::user()->id == $post->user_id))
    <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" >Delete</button>
            </form>


            @endif


@endforeach
@include('errors')
@endsection
</div>
</div>
 </div>
<br>

