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
    return redirect('/videos');
});

Route::get('videos', function() {
    return view('app.videos');
})->name('videos');

Route::get('video/{id}', function($id) {
    return view('app.video', compact('id'));
})->name('video');

Route::get('video-rooms', function() {
    return view('app.video-rooms');
})->name('video-rooms');

Auth::routes();

Route::middleware('auth.cookie')->get('video-room/{id}', function($id) {
    return view('app.video-room', compact('id'));
})->name('video-room');

Route::middleware('auth.cookie')->get('send-video', function() {
    return view('app.send-video');
})->name('send-video');

Route::middleware('auth.cookie')->get('create-video-room', function() {
    return view('app.create-video-room');
})->name('create-video-room');
