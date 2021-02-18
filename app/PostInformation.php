<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInformation extends Model
{
  protected $table = 'posts_information';

  public function postInformationToPost() {

    return $this->belongsTo('App\Post', 'post_id', 'id');

  }

}
