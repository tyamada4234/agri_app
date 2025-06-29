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

use App\Http\Controllers\User\EventController;

Route::controller(EventController::class)->prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('event/create', 'add')->name('event.add');
    Route::post('event/create', 'create')->name('event.create');
    Route::get('event', 'index')->name('event.index');
    Route::get('event/edit', 'edit')->name('event.edit');
    Route::post('event/edit', 'update')->name('event.update');
    Route::get('event/delete', 'delete')->name('event.delete');
});

use App\Http\Controllers\User\GenreContoller;

Route::controller(GenreContoller::class)->prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('genre/create', 'add')->name('genre.add');
    Route::post('genre/create', 'create')->name('genre.create');
    Route::get('genre', 'index')->name('genre.index');
    Route::get('genre/edit', 'edit')->name('genre.edit');
    Route::post('genre/edit', 'update')->name('genre.update');
    Route::get('genre/delete', 'delete')->name('genre.delete');
});

use App\Http\Controllers\User\TopicController;

Route::controller(TopicController::class)->prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('topic/create', 'add')->name('topic.add');
    Route::post('topic/create', 'create')->name('topic.create');
    Route::get('topic', 'index')->name('topic.index');
    Route::get('topic/edit', 'edit')->name('topic.edit');
    Route::post('topic/edit', 'update')->name('topic.update');
    Route::get('topic/delete', 'delete')->name('topic.delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
