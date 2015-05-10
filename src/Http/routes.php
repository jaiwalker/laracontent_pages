<?php


	Route::group(array('prefix' => 'blog'), function () {
		// main page for the admin section (app/views/admin/dashboard.blade.php)
//		Route::get('/', function()
//		{
//			return View::make('Blog::dashboard');
//		});

		//Route::get('/createUser', array('uses' => 'Serverfireteam\Panel\UsersController@getCreateUser'));
		//Route::post('/createUser', array('uses' => 'Serverfireteam\Panel\UsersController@postCreateUser'));
		//Route::any('/{entity}/export/{type}', array('uses' => 'Serverfireteam\Panel\ExportImportController@export'));
//		Route::post('/{entity}/import', array('uses' => 'Serverfireteam\Panel\ExportImportController@import'));
		Route::any('/{entity}/{methods}', array('uses' => 'MainController@entityUrl'));
		Route::post('/edit', array('uses' => 'Serverfireteam\Panel\ProfileController@postEdit'));
		Route::get('/edit', array('uses' => 'Serverfireteam\Panel\ProfileController@getEdit'));

	});
