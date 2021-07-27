<section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading" style="margin-bottom: 15px;">Hacker News</h1>
<a class="btn btn-primary" href="{{ url('./post') }}" role="button">The Wall</a>
<a class="btn btn-primary" href="{{ url('/post/create') }}" role="button">Write post</a>
<a class="btn btn-primary" href="{{ url('/dashboard') }}" role="button"> Your account </a>
<a class="btn btn-primary" href="{{ url('./posts/top') }}" role="button"> Most Likes </a>
              <a class="btn btn-primary" href="{{ url('/logout') }}" role="button">Log out</a>
      </div>
    </section>
