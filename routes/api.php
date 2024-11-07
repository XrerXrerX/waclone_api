<?php

use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\ChatroomUserController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Faker\Documentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/docs', [DocumentationController::class, 'documentation']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/allchatrooms', [ChatroomController::class, 'allchatrooms']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/listuser', [UserController::class, 'listuser']);

    Route::get('/chatrooms', [ChatroomController::class, 'index']);
    Route::post('/listuser/{chatroom_id}', [ChatroomController::class, 'addMembers']);
    Route::post('/chatrooms', [ChatroomController::class, 'store']);

    Route::get('/messages/{chatroom_id}', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'store']);

    Route::get('/chatroomuser/{chatroom_id}', [ChatroomUserController::class, 'show']);
    Route::post('/chatroomuser/{chatroom_id}', [ChatroomUserController::class, 'update']);
});
