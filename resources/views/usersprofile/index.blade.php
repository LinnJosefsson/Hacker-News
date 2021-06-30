<form method="POST" action="{{ route('users.update', Auth::user()->id) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" >

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" >

                <label for="biography">Biography</label>
        <input type="text"  name="biography" value="{{ Auth::user()->biography }}" >


    <button type="submit" >Update
    </button>


</form>




