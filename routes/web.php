<?php

use App\User;

Route::get('/aw', function(){

	return App::VERSION();
});


Route::get('/', function(){
	return redirect()->route('login');
});

Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'auth\AuthController@login'
	]);

	Route::post('/login', [
		'as'=> 'login_check',
		'uses'=> 'auth\AuthController@login_check'
	]);

});


Route::group(['prefix'=> 'admin'], function(){

	Route::get('/main', [
		'as'=> 'admin_main',
		'uses'=> 'admin\AdminController@admin_main'
	]);

	Route::get('/login', [
		'as'=> 'admin_logout',
		'uses'=> 'admin\AdminController@admin_logout'
	]);

	Route::get('/subject', [
		'as'=> 'admin_subject',
		'uses'=> 'admin\AdminController@admin_subject'
	]);

	Route::get('/subject-create', [
		'as'=> 'admin_subject_create',
		'uses'=> 'admin\AdminController@admin_subject_create'
	]);

		Route::post('/subject-create', [
			'as'=> 'admin_create_check',
			'uses'=> 'admin\AdminController@admin_create_check'
		]);

	Route::get('/inquiry', [
		'as'=> 'admin_inquiry',
		'uses'=> 'admin\AdminController@admin_inquiry'
	]);

		Route::get('/inquiry/{id}', [
			'as'=> 'admin_inquiry_view',
			'uses'=> 'admin\AdminController@admin_inquiry_view'
		]);

	Route::get('/reserve', [
		'as'=> 'admin_reserve',
		'uses'=> 'admin\AdminController@admin_reserve'
	]);

		Route::get('/second', [
			'as'=> 'admin_reserve_second',
			'uses'=> 'admin\AdminController@admin_reserve_second'
		]);

		Route::get('/third', [
			'as'=> 'admin_reserve_third',
			'uses'=> 'admin\AdminController@admin_reserve_third'
		]);

		Route::get('/fourth', [
			'as'=> 'admin_reserve_fourth',
			'uses'=> 'admin\AdminController@admin_reserve_fourth'
		]);

		Route::get('/reserve/{id}/view-list', [
			'as'=> 'admin_view_list',
			'uses'=> 'admin\AdminController@admin_view_list'
		]);

	Route::get('/student/list', [
		'as'=> 'admin_students',
		'uses'=> 'admin\AdminController@admin_students'
    ]);

    	Route::get('/student/create', [
    		'as'=> 'admin_students_create',
    		'uses'=> 'admin\AdminController@admin_students_create'
    	]);

    	Route::get('/student/upload', [
    		'as'=> 'admin_students_upload',
    		'uses'=> 'admin\AdminController@admin_students_upload'
    	]);
});

Route::group(['prefix'=> 'student'], function(){

	Route::get('/main', [
		'as'=> 'student_main',
		'uses'=> 'student\StudentController@student_main'
	]);

	Route::get('/second', [
		'as'=> 'student_main_second',
		'uses'=> 'student\StudentController@student_main_second'
	]);

	Route::get('/third', [
		'as'=> 'student_main_third',
		'uses'=> 'student\StudentController@student_main_third'
	]);

	Route::get('/fourth', [
		'as'=> 'student_main_fourth',
		'uses'=> 'student\StudentController@student_main_fourth'
	]);

	Route::get('/logout', [
		'as'=> 'student_logout',
		'uses'=> 'student\StudentController@student_logout'
	]);

	Route::get('/activity', [
		'as'=> 'student_activity',
		'uses'=> 'student\StudentController@student_activity'
	]);

	Route::get('/inquiries', [
		'as'=> 'student_inquiries',
		'uses'=> 'student\StudentController@student_inquiries'
	]);

	Route::get('/subject/{id}/reservation', [
		'as'=> 'student_reservation',
		'uses'=> 'student\StudentController@student_reservation'
	]);

	Route::get('/inquire-now', [
		'as'=> 'student_inquire_now',
		'uses'=> 'student\StudentController@student_inquire_now'
	]);

	Route::post('/inquiry-check', [
		'as'=> 'student_inquiry_check',
		'uses'=> 'student\StudentController@student_inquiry_check'
	]);

	Route::post('/reserve-me-now/{id}', [
		'as'=> 'studnet_reserve_me_now',
		'uses'=> 'student\StudentController@studnet_reserve_me_now'
	]);

});



// Route::get('/new_student', function(){

	
// 	$user = new User ;
// 	$user->id = '456456';
// 	$user->fname = 'Etal';
// 	$user->mname = 'Yu';
// 	$user->lname = 'Buoe';
// 	$user->contact = '09069541280';
// 	$user->address = 'Near far where ever you are';
// 	$user->course = 'BSIT';
// 	$user->email = 'email123@yahoo.com';
// 	$user->password = bcrypt('456456');
// 	$user->status_id = 1;
// 	$user->role_id = 1;
// 	$user->save();
// });