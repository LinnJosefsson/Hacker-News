@extends('layout.mainlayout')

@section('content')


<div class="container">

<form method="post" action="/login">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <button class="btn btn-success" type="submit">Login</button>
</form>

<a href="{{ url('/forgot-password') }}"> Forgot Password?</a>

<br>
<a href="{{ url('/register') }}"> Register</a>

@include('errors')
@endsection


