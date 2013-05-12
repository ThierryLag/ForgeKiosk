<?php
/**
 *	Homepage and Public controller
 *
 * @author      Thierry 'Akarun' Lagasse <thierry@passtech.be>
 * @copyright   Copyright (c) 2013 Passtech.be - Thierry Lagasse (http://www.passtech.be)
 * @since       May 2013
 */
// ====================================================================================================================

class HomeController extends BaseController
{
    /**
     *  Start page
     */
	public function welcome()
	{
		return View::make('home.welcome');
	}

}