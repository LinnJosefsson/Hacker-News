
@extends('layout.mainlayout')

@section('content')

<div class="container">
{{-- <a class="btn btn-primary" href="{{ url('/post/create') }}" role="button">Write post</a>
<a class="btn btn-primary" href="{{ url('/dashboard') }}" role="button"> Your account </a>
<a class="btn btn-primary" href="{{ url('mostlikes') }}" role="button"> Most Likes </a>
 --}}


{{-- <form action="{{ route('getEvents') }}">
    @csrf
    <select name="sort" onchange="this.form.submit()" class="form-control">
        <option value="">Sort By</option>
        <option value="created_at">Date</option>
        <option value="title">Title</option>
        <option value="like">Likes</option>
        <input type="hidden" name="formName" value="sort">
    </select>
</form> --}}

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
        <button>dislike</button>
</form>
 @else
 <form action="{{ url('posts/like', $post) }}" method="post">
    @csrf
<button>like</button>

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
    {{-- <a href="/delete/{{ $post->id}}"><button type="submit">destroy</button></a> --}}
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

