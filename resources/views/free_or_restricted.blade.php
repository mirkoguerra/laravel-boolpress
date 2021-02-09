@if(isset($user))
<p>Ciao utente {{$user->name}}</p>
@else
<p>Ciao utente</p>
@endif
