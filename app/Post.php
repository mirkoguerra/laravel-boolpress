<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

  public function postToPostInformation() {

    return $this->hasOne('App\PostInformation', 'post_id', 'id');

  }

  public function postToCategory() {

    return $this->belongsTo('App\Category', 'category_id', 'id');

  }

  public function postToTag() {

    return $this->belongsToMany('App\Tag', 'posts_to_tags', 'post_id', 'tag_id');

  }

}
