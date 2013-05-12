<?php
/**
 *  Routes definition
 *
 * @author      Thierry 'Akarun' Lagasse <thierry@passtech.be>
 * @copyright   Copyright (c) 2013 Passtech.be - Thierry Lagasse (http://www.passtech.be)
 * @since       May 2013
 */
// ====================================================================================================================

/**
 *  Frontend
 */
Route::get('/', array('as' => 'homepage', 'uses' => 'HomeController@welcome'));
