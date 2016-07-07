<?php

Route::get('/', 'HomeController@index');

Route::auth();

/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/

Route::group(['prefix' => config('constants.url.backend-prefix'), 'middleware' => ['auth']], function() {

    Route::get('/', 'Backend\DashboardController@index');

    Route::resource('users', 'Backend\UsersController');

    Route::resource('roles', 'Backend\RolesController');

    Route::resource('permissions', 'Backend\PermissionsController');

    Route::resource('menus', 'Backend\MenusController');

    Route::resource('pages', 'Backend\PagesController');

    Route::resource('settings', 'Backend\SettingsController');

    /**
     * Modules
     */
    Route::resource('modules/about-description', 'Backend\Modules\AboutDescriptionController');
	
	Route::resource('modules/home-slideshow', 'Backend\Modules\HomeSlideshowController');

    Route::resource('modules', 'Backend\ModulesController');

});
