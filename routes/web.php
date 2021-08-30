<?php

Route::any('products/search', 'ProdutController@search')->name('products.search');

Route::resource('products', 'ProdutController');//->middleware('auth');
/*
Route::delete('products/{id}', 'ProductController@destroy')->name('product.destroy');

Route::put('products/{id}', 'ProductController@update')->name('products.update');//editar=put
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');

Route::post('products/store', 'ProductController@store')->name('products.store');
Route::get('products', 'ProductController@index')->name('products.index');
*/
?>