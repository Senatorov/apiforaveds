<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\EmployeeController;

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

Route::apiResources([
    'employee' => EmployeeController::class,
]);

Route::get('/all', [EmployeeController::class, 'index'])->name('all');
Route::get('/{id}', [EmployeeController::class, 'show'])->where('id', '[0-9]+');
Route::post('/create', [EmployeeController::class, 'store'])->name('create');
