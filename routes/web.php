<?php

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
Route::get('fire', function () {
    // this fires the event
    event(new \App\Events\NewMessage(\App\ChatRoom::where('id',7)->with('user')->first()));
    return "event fired";
});

Route::get('test', function () {
    // this checks for the event
    return view('test');
});