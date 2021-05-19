<?php

//DB::listen(function($query){var_dump($query->sql);});


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
    // todo redirect to home if logged in
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    
    /* ajax */
    Route::prefix('api')->group(function () {
        
        /* tweets */
        Route::post('/tweets', [App\Http\Controllers\Api\TweetsController::class, 'store']);
        
        /* likes */
        Route::post('/likes', [App\Http\Controllers\Api\LikesController::class, 'store']);
        Route::delete('/likes/{id}', [App\Http\Controllers\Api\LikesController::class, 'destroy']);

        /* follows */
        Route::post('/follows', [App\Http\Controllers\Api\FollowsController::class, 'store']);
        Route::delete('/follows/{id}/', [App\Http\Controllers\Api\FollowsController::class, 'destroy']);

    });
    

    /* home */
    Route::get('/home', App\Http\Controllers\HomeController::class)  // invokable
        ->name('home');


    /* tweets */
    Route::post('/tweets', [App\Http\Controllers\TweetsController::class, 'store']);
    
    
    /* likes */
    Route::post('/likes', [App\Http\Controllers\LikesController::class, 'store']);
    Route::delete('/likes/{id}', [App\Http\Controllers\LikesController::class, 'destroy']);
    

    /* profiles */
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])
        ->middleware("can:edit,user");
    
    Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'update'])
        ->middleware("can:edit,user");
    

    /* follows */
    Route::post('/profiles/{user:username}/follows', [App\Http\Controllers\ProfileFollowsController::class, 'store']);


    /* explore */
    Route::get('/explore', App\Http\Controllers\ExploreController::class);  // invokable
    
});

/* profile */
Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])
    ->name('profiles.show');


Auth::routes();





