<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Verbos http
| get
| post
| put
| patch
| delete
| options
*/

//Route::get('/', function () {
//    return 'Olá, seja bem vindo!';
//});

Route::get('/','PrincipalController@principal')->name('site.index');

Route::get('/sobrenos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function (){ return 'Login';})->name('site.login');
// Agrupando rotas
Route::prefix('/app')->group(function (){
    Route::get('/clientes', function (){
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos', function (){
        return 'produtos';
    })->name('app.produtos');
});

//Redirecionamento de rotas
Route::get('/rota1', function (){
    echo 'rota 1';
})->name('site.rota1');

Route::get('/rota2', function (){
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Passando parametros para controller
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');
//Route::redirect('/rota2','/rota1');

// A Rota fallback usada para customizar a rota de erro padrão do laravel
Route::fallback( function (){
   echo 'A rota acessada não existe. <a href="'.route('site.index').'"> clique aqui</a> para voltar a página inicial.';
});
//Passando Parametros nas rotas
Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria = 1){
    echo "Estamos aqui: $nome - $categoria";
})
    ->where('categoria_id','[0-9]+')
    ->where('nome','[A-Za-z]+');

