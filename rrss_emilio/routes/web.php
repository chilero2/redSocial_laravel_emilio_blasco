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

    Route::get('/', 'RedSocialController@index')->name('pages.index');


    //    Route::get('/log-in', 'RedSocialController@login')->name('pages.log-in');


    Route::middleware([
                          'auth:sanctum',
                          config('jetstream.auth_session'),
                          'verified',
                      ])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('', function () {
                return view('dashboard');
            })->name('dashboard');
        });


    });
