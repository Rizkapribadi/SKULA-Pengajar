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
Route::get('/materi', 'MateriController@index')->name('materi.index');
Route::post('/materi/create', 'MateriController@store')->name('materi.store');
Route::get('/materi/{materi}/edit', 'MateriController@edit')->name('materi.edit');
Route::patch('/materi/{materi}/edit', 'MateriController@update')->name('materi.update');
Route::delete('/materi/{materi}/delete', 'MateriController@destroy')->name('materi.destroy');
Route::get('/materi/{materi}', 'MateriController@detail')->name('materi.detail');
Route::patch('/materi/{materi}', 'MateriController@check')->name('updatedetail');
Route::put('/materi/updateAll', 'MateriController@updateAll')->name('materi.updateAll');
Route::get('/trash/', 'MateriController@trash')->name('trash');
Route::get('/restore/{materi}', 'MateriController@restore')->name('restore');
Route::get('/forceDelete/{materi}', 'MateriController@forceDelete')->name('forceDelete');
Route::get('/', 'PelajaranController@index')->name('pelajaran.index');
Route::get('/pelajaran/{pelajaran}/createMateri', 'PelajaranController@createMateri')->name('pelajaran.createMateri');
Route::get('/pelajaran/{pelajaran}/show', 'PelajaranController@show')->name('pelajaran.show');
Route::get('/pelajaran/create', 'PelajaranController@create')->name('pelajaran.create');
Route::post('/pelajaran/create', 'PelajaranController@store')->name('pelajaran.store');
Route::get('/pelajaran/{pelajaran}/edit', 'PelajaranController@edit')->name('pelajaran.edit');
Route::patch('/pelajaran/{pelajaran}/edit', 'PelajaranController@update')->name('pelajaran.update');
Route::get('/search', 'MateriController@search')->name('search');
Route::get('/export', 'MateriController@export')->name('materi.export');
Route::get('/action-page', 'MateriController@actionPage')->name('action-page');
Route::post('/import', 'MateriController@import')->name('materi.import');