<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'content'=>$faker->paragraph,
        'url'=>$faker->url,
        'user_id'=>function(){
           return factory(App\User::class)->create()->id;
        },
        'category_id'=>function(){
           return factory(App\Category::class)->create()->id;
        }
    ];
});
 