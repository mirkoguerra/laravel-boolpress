@extends('layouts.layout')
@section('title', 'modifica post')
@section('content')
<main class="create-post">
  <div class="sub-create-post">
    <form class="" action="{{ route('posts.update', $post->id) }}" method="post">
      @method('put')
      @csrf

      <div class="">
        <label for="title">Titolo:</label>
        <input class="@error('title') red @enderror" autocomplete="off" id="tite" type="text" name="title" value="{{ $post->title }}">
        @error('title')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="">
        <label for="author">Autore:</label>
        <input class="@error('author') red @enderror" autocomplete="off" id="author" type="text" name="author" value="{{ $post->author }}">
        @error('author')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="">
        <label for="categories">Categorie:</label>
        <select id="categories" class="" name="category_id">
          @foreach ($categories as $category)
          <option {{ $post->postToCategory->id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <label for="description">Descrizione:</label>
        <textarea class="@error('description') red @enderror" autocomplete="off" id="description" name="description" rows="8" cols="80">{{ $post->postToPostInformation->description }}</textarea>
        @error('description')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="tags">
      @foreach ($tags as $tag)
        <input {{ $post->postToTag->contains($tag) ? 'checked' : '' }} id="{{ 'tag_'.$tag->name }}" type="checkbox" name="tags[]" value="{{ $tag->id }}">
        <label for="{{ 'tag_'.$tag->name }}">{{ $tag->name }}</label>
      @endforeach
      </div>

      <div class="button">
        <button type="submit" name="button">Aggiorna</button>
      </div>

    </form>
  </div>
</main>
@endsection
