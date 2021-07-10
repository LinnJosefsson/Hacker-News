<form action="/post" method="POST">
@csrf
<label for="title">Title</label>
<input type="text" name="title" id="title">

<label for="message">Message</label>
<textarea name="message" id="message"></textarea>

<label for="link">Link</label>
<textarea name="link" id="link"></textarea>
{{-- <label for="image_post">Image</label>
<input type="file" name="image"> --}}

<button type="submit" >Create
    </button>
</form>
