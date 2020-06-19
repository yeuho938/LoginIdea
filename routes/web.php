<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
// len duong link dung get // POST lay form/delete
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/login', 'Auth\LoginController@index')->name("auth.login");
Route::get('/auth/register', 'Auth\RegisterController@index')->name("auth.register");
Route::post('/auth/register', 'Auth\RegisterController@register');


Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name("admin.dashboard");

Route::get('/home', 'User\HomeController@index')->name("home");

