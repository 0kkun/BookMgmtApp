<?php




Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    // get で /books/{id}/books にリクエストが来たら BookControllerのindexメソッドを呼びだす。最後にこのルートに名前をつけてる
    Route::get('/books', 'BookController@index')->name('books.index');

    Route::get('/books/create', 'BookController@showCreateForm')->name('books.create');
    Route::post('/books/create', 'BookController@create');


    Route::get('/books/{id}/edit', 'BookController@showEditForm')->name('books.edit');
    Route::post('/books/{id}/edit', 'BookController@edit');

    Route::post('/book/delete/{id}', 'BookController@delete');

    Route::get('/user/{user}', 'UserController@show')->name('user.show');
    Route::get('/users/{id}', 'UserController@showProfile')->name('users.show');

    Route::get('/books/{id}/shelfs/create', 'ShelfController@showCreateForm')->name('shelfs.create');
    Route::post('/books/{id}/shelfs/create', 'ShelfController@create');
});

Auth::routes();