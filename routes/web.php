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
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Auth::routes(['register' => false]);
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    //LINKS
    Route::get('/historico-links', ['as' => 'historico.all', 'uses' => 'App\Http\Controllers\HistoricoController@index']);

    Route::get('/historico-links/{id}', ['as' => 'historico.single', 'uses' => 'App\Http\Controllers\HistoricoController@show']);

    //ACESSOS
    Route::get('/historico-acessos', ['as' => 'acessos.all', 'uses' => 'App\Http\Controllers\AcessosController@index']);

    //INDICAÇÕES
    Route::get('/indicacoes', ['as' => 'indicacoes.all', 'uses' => 'App\Http\Controllers\IndicacoesController@index']);

    //EMPREENDIMENTOS
    Route::get('/empreendimentos', ['as' => 'empreendimentos.all', 'uses' => 'App\Http\Controllers\EmpreendimentosController@index']);

    Route::get('/empreendimentos/update', ['as' => 'empreendimentos.update', 'uses' => 'App\Http\Controllers\EmpreendimentosController@update']);

    //REPASSES
    Route::get('/repasses', ['as' => 'repasses.all', 'uses' => 'App\Http\Controllers\RepassesController@index']);

    //CADASTROS
    Route::get('/cadastros', ['as' => 'cadastros.all', 'uses' => 'App\Http\Controllers\CadastrosController@index']);

    //USUÁRIOS
    Route::get('/usuarios', ['as' => 'usuarios.all', 'uses' => 'App\Http\Controllers\UsuariosController@index']);

    //CONFIGURAÇÕES
    Route::get('/configuracoes', ['as' => 'config.all', 'uses' => 'App\Http\Controllers\ConfigsController@index']);

});
