<?php

use App\Http\Resources\MessageResource;
use App\Http\Resources\ThreadResource;
use App\Http\Resources\TopicResource;
use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/message/{id}', function ($id) {
        return new MessageResource(Message::find($id));
    });
    Route::get('/thread/{id}/messages', function ($id) {
        return MessageResource::collection(Message::all()->where('thread_id', $id));
    });
    Route::get('/thread/{id}', function ($id) {
        return new ThreadResource(Thread::find($id));
    });
    Route::get('/threads', function () {
        return ThreadResource::collection(Thread::all());
    });
    Route::get('/topic/{id}/threads', function ($id) {
        return ThreadResource::collection(Thread::all()->where('topic_id', $id));
    });
    Route::get('/topics', function () {
        return TopicResource::collection(Topic::all());
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mollie', [\App\Http\Controllers\BuyCrystalController::class, 'webhook'])->name('webhooks.mollie');
