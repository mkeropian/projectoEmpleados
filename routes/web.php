<?php

use App\Http\Controllers\EmpleadosController;
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

Route::get('/', function (){
    return view("welcome");
});

Route::get('/alta', [EmpleadosController::class,"alta"])->name("empleados.alta");
Route::post('/guardar', [EmpleadosController::class,"guardar"])->name("empleados.guardar");
