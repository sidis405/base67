<?php

Route::get('/', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController')->except('index');
Auth::routes();


// Route::get('posts/create', 'PostsController@create')->name('posts.create');
// Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
// Route::post('posts', 'PostsController@store')->name('posts.store');
// Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
// Route::patch('posts/{post}', 'PostsController@update')->name('posts.update');
// Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');


// Route::get('posts/{post}', 'PostsController@show')->name('posts.show')->where('post', '[0-9]+');


// CRUD - create - read - update - delete
// REST
// index    - GET    - /posts                - PostsController@index     - lista posts
// show     - GET    - /posts/{post}         - PostsController@show      - mostra singolo post
// create   - GET    - /posts/create         - PostsController@create    - form creazione nuovo post
// store    - POST   - /posts                - PostsController@store     - salva nuovo post
// edit     - GET    - /posts/{post}/edit    - PostsController@edit      - form modifica post esistente
// update   - PATCH  - /posts/{post}         - PostsController@update    - aggiorna post esistente
// destroy  - DELETE - /posts/{post}         - PostsController@destroy   - cancella post
