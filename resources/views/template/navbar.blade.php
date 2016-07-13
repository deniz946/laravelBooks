<div class="ui huge menu">
  <a class="active item" href="/">
    Home
  </a>
  <a class="item">
    Messages
  </a>
  <a class="item">
    <form action='/' method='GET'>
      <div class="ui search">
      <div class="ui icon input">
        <input class="prompt" type="text" name='title' placeholder="Search book...">
        <i class="search icon"></i>
      </div>
      <div class="results"></div>
    </div>
    </form>
  </a>
  <div class="right menu">
    
    <div class="item">
        <a href="{{ route('books.create') }}"><button class="ui primary basic button">Add book</button></a>
    </div>

    @unless (Auth::check())
        <div class="item">
            <a href="/login"><div class="ui primary button">Login</div></a>
        </div>
    @endunless
    @if(Auth::check())
    @role('admin')
      <div class="ui dropdown item sidebutton label"><img class="ui right spaced avatar image" src="{{Auth::user()->img}}">Admin panel</div>
    @endrole
    <div class="ui dropdown item">
      {{Auth::user()->name}} <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{ route('users.profile') }}">Profile</a>
        <a href="/logout" class="item">Logout</a>
      </div>
    </div>
    @endif
  </div>
</div>
<br>


@section('js')

  <script>

  </script>

@stop