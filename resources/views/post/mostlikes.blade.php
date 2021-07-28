
@extends('layout.mainlayout')

@section('content')


@foreach ($posts as $post)
<div class="container">
<h2>{{ $post->title }} </h2>
<p>Posted by <b>{{ $post->user->name }}</b></p>
<p>{{$post->created_at}}</p>
 <p> {{ $post->message }}</p>
 <p>{{ $post->vote->where('vote', 0)->count() }} Likes</p>
 </div>
 @endforeach


 @endsection
