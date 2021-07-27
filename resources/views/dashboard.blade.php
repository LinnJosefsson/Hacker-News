

@extends('layout.mainlayout')

@section('content')
<div class="container">
<h1> Hi {{ Auth::user()->name }}!</h1>
<h2>Your biography:</h2>
<p>{{ Auth::user()->biography }}</p>



{{-- @if(Auth::user()->image)
<img src="{{asset('/public/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif --}}


                        @if(Auth::user()->image)
<img src="{{url('/images/' .Auth::user()->image)}}" alt="Image" style="width:100px; margin:20px;"/>
@endif

<br>
<a href="{{ url('./usersprofile/index') }}">Edit your profile</a>
{{-- <a href="{{ url('./post') }}"> Wall </a><br> --}}

</div>
@include('errors')
@endsection
