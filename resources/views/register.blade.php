

<form method="post" action="/register">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" name="name" id="name" type="name" placeholder="name..." />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" name="email" id="email" type="email" placeholder="mail@mail.com..." />
    </div>
        <div class="form-group">
        <label for="biography">Biography</label>
        <textarea name="biography" id="biography" placeholder="..."></textarea>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" name="password" id="password" type="password" placeholder="*****" />
    </div>
    <button type="submit">Register</button>
</form>
@include('errors')


