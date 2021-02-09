@extends('layouts.layout')
@section('title', 'post')
@section('content')
<main class="watch-post">
  <div class="sub-watch-post">
    <p><strong>titolo:</strong> {{$post->title}}</p>
    <p><strong>categoria:</strong> {{$post->postToCategory->title}}</p>
    <p><strong>descrizione:</strong> {{$post->postToPostInformation->description}}</p>
    <p><strong>tags:</strong>
      @foreach($post->postToTag as $tag)
        {{$tag->name}}
        @endforeach
    </p>
  </div>
</main>
@endsection
