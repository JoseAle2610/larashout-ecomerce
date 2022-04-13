<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

    });
});
