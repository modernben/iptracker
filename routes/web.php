<?php

use Illuminate\Http\Request;
use Native\Laravel\Facades\Shell;
use Native\Laravel\Facades\System;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\MenuBar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('openBrowser', function(Request $request){
    Shell::openExternal($request->url);

    dispatch(function(){
        MenuBar::hide();
    })->afterResponse();

})->name('openBrowser');
