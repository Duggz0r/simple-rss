<?php

Route::get('/', 'HomeController@index')->name('welcome');

Route::post('load-articles', 'HomeController@return')->name('load-articles');

Route::post('edit-articles', 'HomeController@edit')->name('edit-articles');

Route::get('/delete/{url_id}', 'HomeController@delete')->name('delete');
