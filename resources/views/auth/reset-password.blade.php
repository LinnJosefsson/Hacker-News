@include('errors')

<form action="/reset-password" method="POST">
    @csrf
    <label for="email">Email</label>
        <input name="email" id="email" type="email" />

        <label for="password">Password</label>
        <input name="password" id="password" type="password" placeholder="*****" />

        <label for="password-confirm">Confirm Password</label>
                <input type="hidden" name="token" value="{{ request()->token }}">

                     <input name="password_confirmation" type="password">

                        <button type="submit">GO</button>
</form>
