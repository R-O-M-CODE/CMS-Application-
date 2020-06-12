<?php


use Illuminate\Support\Facades\Route;

Route::patch('/users/{user}/profile', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
Route::middleware('role:Admin')->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});
Route::middleware(['can:view,user'])->group(function (){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
