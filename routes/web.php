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

Route::get('/message', function () {
    return view('messageJquery.messages');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/send', function () {
    $message= request()->input('message');
    event(new \App\Events\SendMessage($message));
    return back();
})->name('sendMessage');
