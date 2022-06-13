<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return DrUser.index route
    return redirect()->route('DrUser.index');
    
});

// disable authentication for the following routes
Route::group(['middleware' => ['web']], function () {
    Route::get('/user', 'UserController@index')->name('user');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('DashboardController@index');
})->name('dashboard');

// route controller from dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('DrDoc', 'DocumentController');
Route::resource('DrAcc', 'AccountController');
Route::resource('DrType', 'DocumentTypeController');
Route::resource('DrCabinet', 'CabinetController');
Route::resource('DrSearch', 'SearchController');
Route::resource('DrCategory', 'CategoryController');
Route::resource('DrDashboard', 'DashboardController');
Route::resource('DrUser', 'UserController');