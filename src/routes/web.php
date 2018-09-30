<?php

Route::group(
    [
        'middleware' => 'web',
        'namespace' => 'DtechBook\Book\App\Http\Controllers',
        'prefix' => '/dtech-book/books'
    ],
    function (){

        Route::get('/', 'BookController@index')->name('books.index_path');
        Route::get('/index', 'BookController@index')->name('books.index_path');

        Route::get('/create', 'BookController@create')->name('books.create_path');
        Route::post('/store', 'BookController@store')->name('books.store_path');

        Route::get('/show/{id}', 'BookController@show')->name('books.show_path');

        Route::get('/edit/{id}', 'BookController@edit')->name('books.edit_path');
        Route::put('/update/{id}', 'BookController@update')->name('books.update_path');

        Route::delete('/delete/{id}', 'BookController@destroy')->name('books.destroy_path');

    }
);