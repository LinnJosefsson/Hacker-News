<a href="{{ url('/post/create') }}">Write post</a>
<a href="{{ url('/dashboard') }}"> Back to main </a>



@include('errors')

@foreach ($posts as $post)
<h2>Posted by {{ $post->user->name }} {{$post->created_at}}</h2>
<h2>{{ $post->title }} </h2>
 <p> {{ $post->message }}</p>
 <p> {{ $post->link }}</p>
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

