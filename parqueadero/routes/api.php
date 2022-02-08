<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\V1\ProductsController;
use Illuminate\Support\Facades\Http;


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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/tareas', 'Api\ProducController@hello');

Route::post('/vehiculos/guardar', 'Api\VehiculosController@store');
Route::get('/vehiculos/filtros/{busqueda}/{parametro}', 'Api\VehiculosController@listarfiltros');
Route::get('/vehiculos/listartodos', 'Api\VehiculosController@index');
