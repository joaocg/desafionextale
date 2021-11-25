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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['throttle:30|60,1'])
    ->prefix('/')
    ->group(function () use ($router) {
        $router
            ->prefix('/v1')
            ->namespace('App\Http\Controllers')
            ->group(function () use ($router) {
                /**
                 * Routs Stories
                 */
                $router->apiResource('story', 'StoryController');
                /**
                 * Routs Medias
                 */
                $router->apiResource('media', 'MediaController');
                $router->get('/media/story/{story_id}', 'MediaController@showByStory');
            });
    });


