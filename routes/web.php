<?php

Route::get('contact/lists', 'ContactUsController@index')
    ->name('contactus.lists');
Route::get('contact', 'ContactUsController@create')
    ->name('contactus.create');
Route::post('store', 'ContactUsController@store')
    ->name('contactus.store');
Route::get('show/{id}', 'ContactUsController@show')
    ->name('contactus.show');
Route::post('/destroy', 'ContactUsController@destroy')
    ->name('contactus.destroy');
