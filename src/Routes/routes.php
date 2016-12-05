<?php

/**
 * Roles And Permissions Routes
 */

// Roles And Permissions Group
// Based on route_group_name variable in config file
Route::group(['prefix' => config('RolesAndPermissions.route_group_name'),'middleware' => ['web','auth']], function () {

	// Roles
	Route::resource('/role', 'Heymowski\RolesAndPermissions\Controllers\RoleController');
	// Permissions
	Route::resource('/permission', 'Heymowski\RolesAndPermissions\Controllers\PermissionController');
	// Users - Roles
	Route::get('/user', 'Heymowski\RolesAndPermissions\Controllers\UserController@index');
	Route::get('/user/{user}/edit', 'Heymowski\RolesAndPermissions\Controllers\UserController@edit');
	Route::put('/user/{user}', 'Heymowski\RolesAndPermissions\Controllers\UserController@update');

});
