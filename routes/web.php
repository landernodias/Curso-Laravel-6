<?php
/*
testando commit gitkraken juio
*/
Route::any('products/search', 'ProdutController@search')->name('products.search')->middleware('auth');

Route::resource('products', 'ProdutController')->middleware(['auth', 'check.is.admin']);
/*
Route::delete('products/{id}', 'ProductController@destroy')->name('product.destroy');

Route::put('products/{id}', 'ProductController@update')->name('products.update');//editar=put
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');

Route::post('products/store', 'ProductController@store')->name('products.store');
Route::get('products', 'ProductController@index')->name('products.index');
*/


/**
 * modificação
 */
Route::get('/', function(){
    return view('welcome');
});

Auth::routes(['register' => false]);
