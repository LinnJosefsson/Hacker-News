

@extends('layout.mainlayout')

@section('content')
<div class="container">
<h1> Hi {{ Auth::user()->name }}!</h1>
<h2>Your biography:</h2>
<p>{{ Auth::user()->biography }}</p>


 @if(Auth::user()->image)
<img src="{{url('/images/' .Auth::user()->image)}}" alt="Image" style="width:100px; margin:20px;"/>
@endif

<br>
<a href="{{ url('./usersprofile/index') }}">Edit your profile</a>

</div>
@include('errors')
@endsection
