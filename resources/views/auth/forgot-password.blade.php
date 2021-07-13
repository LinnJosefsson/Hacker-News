
<p>Enter your email and then check your inbox to reset your password</p>
<form action="/forgot-password" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ request()->token }}">
<label for="email">Email</label>
        <input name="email" id="email" type="email" />

        <button type="submit">Kör</button>
</form>
