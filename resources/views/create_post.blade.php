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
        <input class="@error('title') red @enderror" autocomplete="off" id="tite" type="text" name="title" value="{{old('title')}}">
        @error('title')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="">
        <label for="author">Autore:</label>
        <input class="@error('author') red @enderror" autocomplete="off" id="author" type="text" name="author" value="{{old('author')}}">
        @error('author')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="">
        <label for="categories">Categorie:</label>
        <select id="categories" class="" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <label for="description">Descrizione:</label>
        <textarea class="@error('description') red @enderror" autocomplete="off" id="description" name="description" rows="8" cols="80">{{old('desctiption')}}</textarea>
        @error('description')
        <p>{{ $message }}</p>
        @enderror
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
