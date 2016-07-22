<?php

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
    foreach (config('module.widget') as $module) {
        if(isset($module['route-custom'])) {
            foreach ($module['route-custom'] as $routeCustom) {
                if($routeCustom['type'] == 'post') {
                    Route::post($routeCustom['url'], $routeCustom['action']);
                } else if($routeCustom['type'] == 'delete') {
                    Route::delete($routeCustom['url'], $routeCustom['action']);
                } else if($routeCustom['type'] == 'patch') {
                    Route::patch($routeCustom['url'], $routeCustom['action']);
                } else {
                    Route::get($routeCustom['url'], $routeCustom['action']);
                }
            }
        }

        Route::resource($module['url'], $module['route-controller']);
    }

    Route::resource('modules', 'Backend\ModulesController');

});

/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::get('/demo', function () {
    return view('layouts.local-demo');
});

Route::get('/', 'PageController@index');
Route::get('{slug}', 'PageController@index');
Route::get('{slug}/{itemSlug}', 'PageController@show');
