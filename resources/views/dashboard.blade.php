<h1> Hej {{ Auth::user()->name }} !</h1>

@if(Auth::user()->image)
<img src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif


<a href="{{ url('./usersprofile/index') }}">Edit Profile</a>
<a href="{{ url('/logout') }}"> Logga ut </a>
