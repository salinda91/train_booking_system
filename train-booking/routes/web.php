<?php

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
//site routes
Route::get('/', 'SiteController@index')->name('site.home');
Route::get('/search', 'SiteController@search')->name('site.search');
Route::get('/train/book/{id}', 'SiteController@bookTrain')->name('site.book');
Route::post('/train/book/save', 'SiteController@bookSaveTrain')->name('site.book.save');


//Admin routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/trains', 'HomeController@getAllTrains')->name('admin.trains');
Route::get('/admin/train-add', 'HomeController@addAllTrains')->name('admin.trains.add');
Route::post('/admin/train-save', 'HomeController@saveAllTrains')->name('admin.trains.save');
Route::get('/admin/train-edit/{id}', 'HomeController@editTrain')->name('admin.trains.edit');
Route::post('/admin/train-edit/save', 'HomeController@editSaveTrain')->name('admin.train.edit.save');

