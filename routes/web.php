<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath'
        ]
    ],
    function () {

        Route::get('/', function () {
            return view('home');
        });

        Auth::routes(['register' => false]);

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/{page}', 'AdminController@index');
    }
);