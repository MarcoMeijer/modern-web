<?php

use App\Http\Controllers\BuyCrystalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\TopicController;
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

// PUBLIC ROUTES ==========================================================
Route::get('/', function () {
    return view('welcome');
});
Route::get('/download', function () {
    return view('download');
});
Route::get('/developers', function () {
    return view('developers');
});
Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::post('/shop/buy/{amount}', [BuyCrystalController::class, 'preparePayment'])->name('prepare-payment');
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::resource('topics.threads', App\Http\Controllers\ThreadController::class)->shallow();
Route::resource('messages', App\Http\Controllers\MessagesController::class);

require __DIR__ . '/auth.php';

// LOGGED IN ROUTES =======================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// ADMIN ROUTES ===========================================================
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
    Route::delete('/topics/{id}', [TopicController::class, 'destroy'])->name('topics.destroy');
});
