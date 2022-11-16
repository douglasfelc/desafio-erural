<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes v1
Route::prefix('v1')->group(function() {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout')->middleware('jwt.auth');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh')->middleware('jwt.auth');
    Route::post('me', 'App\Http\Controllers\AuthController@me')->middleware('jwt.auth');

    Route::apiResource('user', 'App\Http\Controllers\UserController')->middleware('jwt.auth');
    Route::apiResource('video', 'App\Http\Controllers\VideoController')->middleware('jwt.auth');
    Route::apiResource('video_comment', 'App\Http\Controllers\VideoCommentController')->middleware('jwt.auth');
    Route::apiResource('video_room', 'App\Http\Controllers\VideoRoomController')->middleware('jwt.auth');
    Route::apiResource('video_room_item', 'App\Http\Controllers\VideoRoomItemController')->middleware('jwt.auth');
    Route::apiResource('video_room_chat', 'App\Http\Controllers\VideoRoomChatController')->middleware('jwt.auth');
});
