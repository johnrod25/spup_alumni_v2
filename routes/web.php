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
    return view('public.home.index');
})->name('home');
Route::view('/login', 'public.Home.login')->name('login');
Route::view('/register', 'public.Home.register')->name('register');
Route::view('/announcement', 'public.Home.announcement')->name('announcement');
Route::view('/news', 'public.Home.news')->name('news');
