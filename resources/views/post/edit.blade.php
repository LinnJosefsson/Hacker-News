<form action="/post/{{ $post->id }}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="id" value="{{ $post->id }}">
<label for="title">Title</label>
<input type="text" name="title" id="title" value="{{ $post->title }}">

<label for="message">Message</label>
<textarea name="message" id="message">{{ $post->message }}</textarea>

<label for="image_post">Image</label>
<input type="file" name="image">

<button type="submit" >Create
    </button>
</form>
