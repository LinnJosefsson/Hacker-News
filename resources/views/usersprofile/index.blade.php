 @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form method="POST" action="{{ route('users.update', Auth::user()->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" >

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" >

                <label for="biography">Biography</label>
        <input type="text"  name="biography" value="{{ Auth::user()->biography }}" >
<label for="image">Image</label>
                        <input type="file" name="image">

                            <a href="{{ url('/dashboard') }}"> Back to main </a>

                        @if(Auth::user()->image)
<img src="{{url('/images/' .Auth::user()->image)}}" alt="Image"/>
@endif

    <button type="submit" >Update
    </button>


</form>




