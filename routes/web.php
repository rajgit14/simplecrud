<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});


Route::get('/index', function () {
    return view('index');
});

Route::post('/createdata',[EmployeeController::class,'registerdata']);
// Route::post('/createdata', [StudentController::class, 'createdata']);
Route::get('/index', [EmployeeController::class, 'index']);
Route::get('/delete/{id}', [EmployeeController::class, 'deletedata']);
Route::get('/edit/{id}', [EmployeeController::class, 'editdata']);
Route::post('/update', [EmployeeController::class, 'updatedata']);





