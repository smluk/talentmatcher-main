<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('event');
Route::post('/eventsupdate', [App\Http\Controllers\EventController::class, 'update'])->name('eventupdate');

Route::get('/comments/get/{event_id}', 'App\Http\Controllers\CommentController@getComments');
Route::post('/comments/add', 'App\Http\Controllers\CommentController@addComment');


Route::get('/events/mine', [App\Http\Controllers\EventController::class, 'mine'])->name('events.mine');
Route::get('/useredit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edituser', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::get('/appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment');
Route::get('/appointment/set/{event_id}', [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/chat/{id?}', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/setTags', [App\Http\Controllers\SearchController::class, 'setTags'])->name('setTags');
Route::get('/search/job', [App\Http\Controllers\SearchController::class, 'getJobs'])->name('getJobs');
Route::get('/search/talent', [App\Http\Controllers\SearchController::class, 'getTalents'])->name('getTalents');


Route::resource('events', EventController::class);
Route::resource('comments', CommentController::class);
Route::resource('users', UserController::class);


