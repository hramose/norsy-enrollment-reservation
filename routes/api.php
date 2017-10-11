<?php

use Illuminate\Http\Request;

Route::group(['prefix'=> 'user'], function(){

	Route::resource('/subjects','api\SubjectController');

	Route::post('/login', 'api\UserController@login');

});
