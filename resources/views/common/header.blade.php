<header>

  <ul>
    <!-- @foreach(config('configuration.routes') as $route)
    <li class="{{ Route::currentRouteName() == $route['pathId'] ? 'active' : '' }}"><a href="{{ route($route['pathId']) }}">{{ $route['displayText'] }}</a></li>
    @endforeach -->

    <li class="{{ Route::currentRouteName() == 'posts.index' ? 'active' : '' }}">
      <a href="{{ route('posts.index') }}">Tutti i post</a>
    </li>

    @if(isset($user))
    <li class="{{ Route::currentRouteName() == 'posts.create' ? 'active' : '' }}">
      <a href="{{ route('posts.create') }}">Aggiungi post</a>
    </li>
    @endif

  </ul>

</header>
