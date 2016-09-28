<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'App\PagesController@index');
Route::auth();

Route::get('cronjob', 'App\AppController@cronjob');

Route::get('contact', 'App\PagesController@contact');


Route::group(['prefix' => 'occasions'], function() {

    Route::get('/', 'App\OccasionController@index');

});

Route::group(['middleware' => 'auth'], function() {
    
    Route::group(['prefix' => 'dashboard'], function() {

        /**
         * Projectboomer/public/dashboard Routes
         * Test
         */

        Route::get(     '/', 'Dashboard\DashboardController@index');

        Route::resource('occasion',                         'Dashboard\OccasionController');
        Route::get(     'occasion/getmodel',                'Dashboard\OccasionController@getModel');
        Route::get(     'occasion/gettrim',                 'Dashboard\OccasionController@getTrim');
        Route::get(     'occasion/createkenteken',          'Dashboard\KentekenController@createKenteken');
        Route::get(     'occasion/getkenteken',             'Dashboard\KentekenController@getKenteken');
        Route::post(    'occasion/parsekenteken',           'Dashboard\KentekenController@parseKenteken');

        Route::resource('image',                            'Dashboard\ImageCollectionController', ['except' => ['index']]);
//        Route::get(     'image')
        Route::post(    'image/uploadphoto',                'Dashboard\PhotoController@postUpload');
        Route::post(    'image/deletephoto',                'Dashboard\PhotoController@deleteUpload');


        Route::get(     'import',               'Dashboard\ImportController@index');
        Route::post(    'import',               'Dashboard\ImportController@store');

        Route::get(     'show-import',          'Dashboard\ImportController@show');

        Route::get(     'occasions',            'Dashboard\OccasionController@occasions');
        Route::get(     'invoeren/occasion',    'Dashboard\OccasionController@addOccasion');
        Route::get(     'kenteken',             'Dashboard\OccasionController@kenteken');
    });
    
});