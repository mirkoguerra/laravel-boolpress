@if(isset($user))
<p>Ciao {{$user->name}}</p>
@else
<p>Non sei registrato!</p>
@endif
