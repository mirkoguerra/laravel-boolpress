<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EditCreateFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Post;
use App\PostInformation;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = Post::paginate(30);

      // $posts = Post::all();

      if (Auth::check()) {
        $user = Auth::user();
        return view('posts', compact(['posts', 'user']));
      } else {
        return view('posts', compact('posts'));
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // per permettere il ciclo su $categories nella view
      $categories = Category::all();
      // per permettere il ciclo su $tags nella view
      $tags = Tag::all();

      if (Auth::check()) {
        $user = Auth::user();
        return view('create_post', compact(['categories', 'tags', 'user']));
      } else {
        return redirect()->route('posts.index');
        // return view('create_post', compact(['categories', 'tags']));
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditCreateFormRequest $request)
    {
      $validated = $request->validated();

      $data = $request->all();

      $newPost = new Post();
      $newPostInformation = new PostInformation();

      $newPost->title = $validated['title'];
      $newPost->author = $validated['author'];
      $newPost->category_id = $data['category_id'];

      $newPostInformation->description = $validated['description'];
      // dovrei crearmi una funzione per generare uno slug sensato, ma visto che ho generato randomicamente i miei dati per il db, non è indispensabile in questo momento
      $newPostInformation->slug = 'non-sono-uno-slug-vuoto';

      $newPost->save();

      $newPostInformation->post_id = $newPost->id;

      $newPostInformation->save();

      // non serve che ciclo, laravel è intelligente, ma nel name delle checkbox devo ricordarmi di mettere tags[], non tag
      $newPost->postToTag()->attach($data['tags']);


      return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      if (Auth::check()) {
        $user = Auth::user();
        return view('watch_post', compact(['post', 'user']));
      } else {
        return view('watch_post', compact('post'));
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      // per permettere il ciclo su $categories nella view
      $categories = Category::all();
      // per permettere il ciclo su $tags nella view
      $tags = Tag::all();

      if (Auth::check()) {
        $user = Auth::user();
        return view('edit_post', compact(['post', 'categories', 'tags', 'user']));
      } else {
        return redirect()->route('posts.index');
        // return view('edit_post', compact(['post', 'categories', 'tags']));
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCreateFormRequest $request, $id)
    {
      $validated = $request->validated();

      $data = $request->all();

      $oldPost = Post::find($id);

      $oldPost->postToTag()->detach();

      $oldPost->title = $validated['title'];
      $oldPost->author = $validated['author'];
      $oldPost->category_id = $data['category_id'];

      $oldPost->save();

      $oldPost->postToPostInformation->description = $validated['description'];

      $oldPost->postToPostInformation->save();

      $oldPost->postToTag()->attach($data['tags']);

      return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);

      // ALTERNATIVA $tags = Tag::all();

      // cancello al contrario rispetto all'ordine di creazione
      $post->postToPostInformation->delete();

      foreach ($post->postToTag as $tag) {
        $post->postToTag()->detach($tag->id);
      }
      // ALTERNATIVA $post->postToTag()->detach($tags);

      $post->delete();

      return redirect()->route('posts.index');
    }
}
