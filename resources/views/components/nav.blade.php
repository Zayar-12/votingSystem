<nav >
    <a href="{{route('welcome')}}">Vote</a>

    @if (Route::has('login'))
         <div>
             @guest
          <a href="{{route("login")}}">login</a>
           <a href="{{route("register")}}">register</a>
    @endguest
         </div>
    @endif
  
       @if (Route::has('logout'))
            @auth
          <a href="{{route("logout")}}">logout</a>
    @endauth
       @endif
   
</nav>