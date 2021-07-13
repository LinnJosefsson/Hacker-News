
<form method="post" action="/login">
    @csrf
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <button type="submit">Login</button>
</form>

<a href="{{ url('/forgot-password') }}"> Forgot Password?</a>


<a href="{{ url('/register') }}"> Register a user </a>

@include('errors')
