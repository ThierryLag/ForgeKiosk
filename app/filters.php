<?php
/**
 *  Filters definition
 *
 * @author      Thierry 'Akarun' Lagasse <thierry@passtech.be>
 * @copyright   Copyright (c) 2013 Passtech.be - Thierry Lagasse (http://www.passtech.be)
 * @since       May 2013
 */
// ====================================================================================================================

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

// --------------------------------------------------------------------------------------------------------------------

/**
 *  The user must be authentified
 */
Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/**
 *  The user must be a "Guest" (unauthentified)
 */
Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

// --------------------------------------------------------------------------------------------------------------------

/**
 * CSRF Protection Filter
 */
Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token')) {
		throw new Illuminate\Session\TokenMismatchException;
	}
});