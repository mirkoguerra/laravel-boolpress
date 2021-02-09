<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

  $words = $faker->words();
  $title = '';

  foreach ($words as $word) {
    $title .= ucfirst($word).' ';
  }

  $title = trim($title);
  $slug = implode('-', $words);

  return [
    'title' => $title,
    'slug' => $slug
  ];
});
