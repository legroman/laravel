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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('contact-us', 'ContactController@index')->name('contact-us');
    Route::post('send-mail', 'MailController@sendMail')->name('send-mail');
    Route::get('success', 'SuccessController@index')->name('success');
    Route::post('profile/update-img/{id}', 'ProfileController@update_image')->name('update-img');
    Route::resource('profile', 'ProfileController');
});

