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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index']);
Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('/admin/users/create',  [App\Http\Controllers\Admin\UserController::class, 'create']);
Route::post('/admin/users/store',  [App\Http\Controllers\Admin\UserController::class, 'store']);
Route::get('/admin/users/{id}/edit',  [App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::post('/admin/users/update',  [App\Http\Controllers\Admin\UserController::class, 'update']);
Route::get('/admin/users/{id}/delete',  [App\Http\Controllers\Admin\UserController::class, 'delete']);



Route::get('/admin/files', [App\Http\Controllers\Admin\FilesController::class, 'index']);
Route::get('/admin/files/create',  [App\Http\Controllers\Admin\FilesController::class, 'create']);
Route::post('/admin/files/store',  [App\Http\Controllers\Admin\FilesController::class, 'store']);
Route::get('/admin/files/{id}/edit',  [App\Http\Controllers\Admin\FilesController::class, 'edit']);
Route::post('/admin/files/update',  [App\Http\Controllers\Admin\FilesController::class, 'update']);
Route::get('/admin/files/{id}/delete',  [App\Http\Controllers\Admin\FilesController::class, 'delete']);

