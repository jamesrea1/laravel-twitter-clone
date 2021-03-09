<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Use App\Models\Tweet;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\TweetController::class, 'index']);
Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store']);



