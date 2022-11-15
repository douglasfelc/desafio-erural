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

Route::apiResource('user', 'App\Http\Controllers\UserController');
Route::apiResource('video', 'App\Http\Controllers\VideoController');
Route::apiResource('video_comment', 'App\Http\Controllers\VideoCommentController');
Route::apiResource('video_room', 'App\Http\Controllers\VideoRoomController');
Route::apiResource('video_room_item', 'App\Http\Controllers\VideoRoomItemController');
Route::apiResource('video_room_chat', 'App\Http\Controllers\VideoRoomChatController');
