<?php

Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
Route::post('/permissions', 'PermissionController@store')->name('permissions.store');
Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
Route::patch('/permissions/{permission}/update', 'PermissionController@update')->name('permissions.update');

