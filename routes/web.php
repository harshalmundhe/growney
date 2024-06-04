<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;



Route::group(['prefix' => 'api'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('forgot-pass', 'AuthController@forgotPass');
    Route::post('reset-pass', 'AuthController@resetPass');


    Route::get('unusual-activity', 'UnusualActivityController@index');
    Route::post('unusual-activity', 'UnusualActivityController@post');
    Route::put('unusual-activity/{id}', 'UnusualActivityController@put');
    Route::delete('unusual-activity/{id}', 'UnusualActivityController@delete');
    
    Route::get('new-listing', 'NewListingController@index');
    Route::post('new-listing', 'NewListingController@post');
    Route::put('new-listing/{id}', 'NewListingController@put');
    Route::delete('new-listing/{id}', 'NewListingController@delete');

    Route::get('new-project', 'NewProjectController@index');
    Route::post('new-project', 'NewProjectController@post');
    Route::put('new-project/{id}', 'NewProjectController@put');
    Route::delete('new-project/{id}', 'NewProjectController@delete');

    Route::get('killer-project', 'KillerProjectController@index');
    Route::post('killer-project', 'KillerProjectController@post');
    Route::put('killer-project/{id}', 'KillerProjectController@put');
    Route::delete('killer-project/{id}', 'KillerProjectController@delete');


    Route::get('eco-system', 'EcoSystemController@index');
    Route::post('eco-system', 'EcoSystemController@post');
    Route::put('eco-system/{id}', 'EcoSystemController@put');
    Route::delete('eco-system/{id}', 'EcoSystemController@delete');

    Route::get('ido-ieo', 'IdoIeoController@index');
    Route::post('ido-ieo', 'IdoIeoController@post');
    Route::put('ido-ieo/{id}', 'IdoIeoController@put');
    Route::delete('ido-ieo/{id}', 'IdoIeoController@delete');

    Route::get('funding-round', 'FundingRoundController@index');
    Route::post('funding-round', 'FundingRoundController@post');
    Route::put('funding-round/{id}', 'FundingRoundController@put');
    Route::delete('funding-round/{id}', 'FundingRoundController@delete');

    Route::group(['middleware' => 'auth:api'], function($router){
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('user-profile', 'AuthController@me');
    });
});




$router->get('images/{dir}/{image}',  function ($dir,$image) {
    
    $path = public_path() . DIRECTORY_SEPARATOR  . 'uploads' . DIRECTORY_SEPARATOR  . $dir . DIRECTORY_SEPARATOR . $image;

    if(!File::exists($path)) {
        $path = public_path() . DIRECTORY_SEPARATOR . "not-found.png";
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

