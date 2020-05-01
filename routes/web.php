<?php


Route::get('/', 'HomeController@index')->name('home');

// get で /books/{id}/books にリクエストが来たら BookControllerのindexメソッドを呼びだす。最後にこのルートに名前をつけてる
Route::get('/books', 'BookController@index')->name('books.index');

Route::get('/books/create', 'BookController@showCreateForm')->name('books.create');
Route::post('/books/create', 'BookController@create');


Route::get('/books/{id}/edit', 'BookController@showEditForm')->name('books.edit');
Route::post('/books/{id}/edit', 'BookController@edit');