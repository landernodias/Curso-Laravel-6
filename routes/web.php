<?php

//grupos de rotas

Route::get('/login', function () {
    return 'Login';
})->name('login');
/*
//aplicando uma verificação via middleware.
Route::middleware([])->group(function () {
    //nome do parametro da rota/admin/...
    Route::prefix('admin')->group( function () {
        //namespace do controller
        Route::namespace('Admin')->group(function() {
            //ajustando os nomes das rotas
            Route::name('admin.')->group(function(){

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
        
                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
    //name não funciona nesse modelo aqui
], function(){

    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
        
        Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');

        Route::get('/produtos', 'TesteController@teste')->name('admin.produtos');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('admin.home');
});


Route::get('/redirect3', function (){
    return redirect()->route('url.name');
});
Route::get('/outro-url', function (){
    return 'Alguma coisa';
})->name('url.name');

//mandando informação direto para view sem controller: evite busque utilizar controller
Route::view('/view','welcome');
//itilizando parametros
Route::view('/view','welcome', ['id' => 'teste']);


//Redirecionando rotas
Route::redirect('/redirect1', '/redirect2');

//outra forma
// Route:: get('redirect1', function (){
//     return redirect('/redirect2');
// });

Route:: get('redirect2', function (){
    return 'Redirect 02';
});

//rotas com parametros opcionais
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

//url com valor fixo
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

//Funciona similar a any mais eu posso expecificar os verbos HTTP
Route::match(['get', 'post'],'/match', function () {
    return 'match';
});

//permite acesso com todos verbos HTTP, Evitar uso.
Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return '';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
