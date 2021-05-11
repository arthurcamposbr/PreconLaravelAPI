<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CollectController;
use App\Http\Controllers\IndicacoesController;
use App\Http\Controllers\API\CVController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::post('/cadastro', [UserController::class, 'cadastro']);
Route::post('/valida-user', [UserController::class, 'validaUsuário']);
Route::post('/envia-token', [UserController::class, 'envia_token']);

Route::group(['domain'=> config('app.url'), 'middleware' => 'auth:api'], function () {
    Route::get('/me', [UserController::class, 'index']);
    Route::get('/indicacoes', [IndicacoesController::class, 'all']);
    Route::post('/add-indicacao', [IndicacoesController::class, 'create']);
});

Route::post('/collect', [CollectController::class, 'index']);

//INTEGRAÇÃO CV
Route::post('/cv/collect', [CVController::class, 'collect']);
Route::post('/cv/update', [CVController::class, 'update']);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('view:cache');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
