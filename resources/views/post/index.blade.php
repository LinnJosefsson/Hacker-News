@foreach ($posts as $post)
<h2>{{ $post->title }} </h2>
 <p> {{ $post->message }}</p>
 <a href="post/{{ $post->id }}/edit">Edit</a>
@endforeach
