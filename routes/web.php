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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index']);

    Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
            Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store']);
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit']);
            Route::post('/update', [App\Http\Controllers\Admin\UserController::class, 'update']);
            Route::get('/{user}/delete', [App\Http\Controllers\Admin\UserController::class, 'delete']);
        });

    Route::group(['prefix' => 'files'], function () {
        Route::get('', [App\Http\Controllers\Admin\FilesController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\Admin\FilesController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\Admin\FilesController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Admin\FilesController::class, 'update']);
        Route::group(['middleware' => 'user'], function () {
            Route::get('/{file}/delete', [App\Http\Controllers\Admin\FilesController::class, 'delete']);
            Route::get('/show/{file}', [App\Http\Controllers\Admin\FilesController::class, 'show']);
            Route::get('/{file}/createpassword', [App\Http\Controllers\Admin\ZipController::class, 'createPassword']);
        });
        Route::post('/storepassword', [App\Http\Controllers\Admin\ZipController::class, 'protectZipFile']);

        //Route::get('/sendfile/{id}',  [App\Http\Controllers\Admin\WebhookController::class, 'sendFile']);
    });


});

