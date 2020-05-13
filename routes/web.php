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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/servicers', 'ServicersController@index');
Route::get('/car-market', 'CarsMarketController@index');
Route::put('/sell/{id}', 'CarsMarketController@update');
Route::get('/servicers/search', 'ServicersController@filter');
Route::get('/servicers/{id}', 'ServicersController@show');



Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/register/servicer', 'Auth\ServicersRegisterController@showRegister');
Route::post('/register/servicer', 'Auth\ServicersRegisterController@register')->name('register.servicer.submit');

// Route::get('/login/servicer', 'Auth\ServicersLoginController@showLogin');
Route::get('/login/servicer', 'Auth\ServicersLoginController@showLogin')->name('login.servicer');
Route::post('/login/servicer', 'Auth\ServicersLoginController@login')->name('login.servicer.submit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('servicer.dashboard');

// Cars
Route::resource('cars', 'CarsController');
Route::get('/status', 'HomeController@status')->name('cars.status');
Route::get('/hires/{id}/edit', 'HireServicersController@index');
Route::put('/hires/{id}', 'HireServicersController@update');

// Repairs
Route::resource('repairs', 'RepairsController');

Route::put('/servicer/{id}', 'ServicersController@update');

Route::get('/home/{id}/edit', 'ProfilesEditUsersController@editUser');
Route::put('/home/{id}/edit', 'ProfilesEditUsersController@updateUser');

Route::get('/dashboard/{id}/edit', 'ProfilesEditServicersController@editServicer');
Route::put('/dashboard/{id}/edit', 'ProfilesEditServicersController@updateServicer');

Route::resource('comments', 'CommentsController');
