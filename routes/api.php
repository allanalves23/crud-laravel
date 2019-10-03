<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categorias', 'ControladorCategoria@indexJson');


Route::get('/produtos', 'ControladorProduto@indexJson');
Route::post('/produtos', 'ControladorProduto@storeApi');
Route::delete('/produtos/{id}', 'ControladorProduto@destroyApi');
Route::get('/produtos/{id}', 'ControladorProduto@showApi');
Route::put('/produtos/{id}', 'ControladorProduto@updateApi');
