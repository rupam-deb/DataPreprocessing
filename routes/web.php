<?php

Route::get('/', 'PetController@index');

Route::prefix('pet')->group(function () {

    Route::get('add', 'PetController@add');
    Route::post('store', 'PetController@store');

    Route::get('update', 'PetController@update');
    Route::post('update', 'PetController@edit');

    Route::get('find', 'PetController@find');
    Route::post('find', 'PetController@details');

    Route::get('findByStatus', 'PetController@findByStatus');
    Route::post('findByStatus', 'PetController@findByStatus');
    
    Route::get('updateByFormData', 'PetController@updateByFormData');
    Route::post('updateByFormData', 'PetController@saveFormData');

    Route::get('delete', 'PetController@delete');
    Route::delete('delete', 'PetController@detailsPet');
});
