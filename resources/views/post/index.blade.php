<a href="{{ url('/post/create') }}">Write post</a>
<a href="{{ url('/dashboard') }}"> Back to main </a>

@foreach ($posts as $post)
<h2>{{ $post->title }} </h2>
 <p> {{ $post->message }}</p>

 <a href="post/{{ $post->id }}/edit">Edit</a>
 <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
    @csrf

    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endforeach

<br>

