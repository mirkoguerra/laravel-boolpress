@extends('layouts.layout')
@section('title', 'tutti i post')
@section('content')
<main class="posts">
  <div class="sub-posts">
    @foreach($posts as $post)
    <section class="post">
      <div class="left">
        <p><strong>titolo:</strong> {{$post->title}}</p>
        <p><strong>categoria:</strong> {{$post->postToCategory->title}}</p>
        <p><strong>descrizione:</strong> {{$post->postToPostInformation->description}}</p>
        <p><strong>tags:</strong>
          @foreach($post->postToTag as $tag)
            {{$tag->name}}
            @endforeach
        </p>
      </div>
      <div class="right">
        <a href="{{ route('posts.show', $post->id) }}">Dettagli</a>
        @if(isset($user))
        <a href="{{ route('posts.edit', $post->id) }}">Modifica</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Elimina</button>
          </form>
        @endif
      </div>
    </section>
    @endforeach
    <div class="pagination">
      {{ $posts->links() }}
    </div>
  </div>
</main>
@endsection
