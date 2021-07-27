
@extends('layout.mainlayout')

@section('content')


@foreach ($posts as $post)
{{-- <img src="{{ asset($post->user->image) }}"> --}}
<h2>{{ $post->title }} </h2>
<p>Posted by <b>{{ $post->user->name }}</b></p>
<p>{{$post->created_at}}</p>
 <p> {{ $post->message }}</p>
 <p>{{ $post->vote->count() }} Likes</p>
 @endforeach


 @endsection
