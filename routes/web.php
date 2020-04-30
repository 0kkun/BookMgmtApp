<?php


Route::get('/', 'HomeController@index')->name('home');

// get で /books/{id}/books にリクエストが来たら BookControllerのindexメソッドを呼びだす。最後にこのルートに名前をつけてる
Route::get('/books/{id}/books', 'BookController@index')->name('books.index');