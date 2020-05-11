<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

// Pages
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');

// Contact routes
Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/contact', 'ContactController@store')->name('post.contact');

//Blog routes
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{id}/{slug}', 'BlogController@show');

//Subscription routes
Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('/subscriptions/{id}', 'SubscriptionController@create');
Route::post('/subscriptions', 'SubscriptionController@store');

//Lesson routes
Route::get('/lessons', 'LessonController@index')->name('lessons');
Route::get('/lessons/{lesson}', 'LessonController@show');
Route::patch('/lessons/{lesson}', 'LessonController@update');

//Records routes
Route::post('/records/{id}', 'RecordController@store');

//Evaluation routes
Route::get('/evaluations/{id}', 'EvaluationController@show');
Route::get('/evaluate/{id}', 'EvaluationController@create');
Route::post('/evaluate', 'EvaluationController@store');

//Processing PayPal payment
Route::post('/paypal', 'PaypalController@pay');
Route::get('/status/{type}/{id}', 'PaypalController@status');

//Get Cities
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');



/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');
        Route::patch('/account', 'AccountController@update');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

