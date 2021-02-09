@extends('layouts.layout')
@section('title', 'nuovo post')
@section('content')
<main class="create-post">
  <div class="sub-create-post">
    <form class="" action="{{ route('posts.store') }}" method="post">
      @method('post')
      @csrf

      <div class="">
        <label for="title">Titolo:</label>
        <input autocomplete="off" id="tite" type="text" name="title" value="">
      </div>

      <div class="">
        <label for="author">Autore:</label>
        <input autocomplete="off" id="author" type="text" name="author" value="">
      </div>

      <div class="">
        <label for="categories">Categorie:</label>
        <select id="categories" class="" name="category_id">
          <option selected>---</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <label for="description">Descrizione:</label>
        <textarea iautocomplete="off" id="description" name="description" rows="8" cols="80"></textarea>
      </div>

      <div class="tags">
      @foreach ($tags as $tag)
        <input id="{{ 'tag_'.$tag->name }}" type="checkbox" name="tags[]" value="{{ $tag->id }}">
        <label for="{{ 'tag_'.$tag->name }}">{{ $tag->name }}</label>
      @endforeach
      </div>

      <div class="button">
        <button type="submit" name="button">Procedi</button>
      </div>

    </form>
  </div>
</main>
@endsection
