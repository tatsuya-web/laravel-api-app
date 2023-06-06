<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Post\CreateController as PostCreateController;
use App\Http\Controllers\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Media\IndexController as MediaIndexController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    ['middleware' => ['auth:sanctum'], 'prefix' => 'post', 'as' => 'post.'], 
    function () {
        //index
        Route::get('/', PostIndexController::class)->name('index');

        //create
        Route::post('/', PostCreateController::class)->name('create');

        //update
        Route::patch('/', PostUpdateController::class)->name('update');

        //delete
        Route::delete('/', PostDeleteController::class)->name('delete');
    }
);

Route::group(
    ['middleware' => ['auth:sanctum'], 'prefix' => 'media', 'as' => 'media.'], 
    function () {
        //index
        Route::get('/', MediaIndexController::class)->name('index');
    }
);
