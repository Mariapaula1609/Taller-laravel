<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:map')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v2')->group(function(){
    Route::prefix('mapa')->group(function(){
        get('/ubicacion', function (Request $request) {
            return "ruta ubicacion";
        });
       // Route::get('/ubicacion', 'ApiMap\UbicacionController@index');
    
});
});