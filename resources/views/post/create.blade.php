
@extends('layout.mainlayout')

@section('content')
<div class="container">
<form action="/post" method="POST">
@csrf
<label for="title">Title</label><br>
<input type="text" name="title" id="title">
<br>

<label for="message">Message</label><br>
<textarea name="message" id="message"></textarea>

<br>

<label for="link">Link</label><br>
<textarea name="link" id="link" required></textarea>
{{-- <label for="image_post">Image</label>
<input type="file" name="image"> --}}
<br>
<button type="submit" >Create
    </button>
</form>
</div>

@include('errors')
@endsection
