<a href="{{ url('/post/create') }}">Write post</a>
<a href="{{ url('/dashboard') }}"> Back to main </a>
<a href="{{ url('mostlikes') }}"> Most Likes </a>


@include('errors')


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
<h2>Posted by {{ $post->user->name }} {{$post->created_at}}</h2>
{{-- <img src="{{ asset($post->user->image) }}"> --}}
<h2>{{ $post->title }} </h2>
 <p> {{ $post->message }}</p>
 <p> {{ $post->link }}</p>
 @include('like', ['model' => $post])
 </div>
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
<br>

