<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title, //Il primo post
        'slug' => str_slug($title), // il-primo-post
        'preview' => $faker->paragraphs(2, true),
        'body' => $faker->paragraphs(12, true),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
    ];
});
