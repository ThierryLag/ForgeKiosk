<?php
/**
 *	Base controller
 *
 * @author      Thierry 'Akarun' Lagasse <thierry@passtech.be>
 * @copyright   Copyright (c) 2013 Passtech.be - Thierry Lagasse (http://www.passtech.be)
 * @since       May 2013
 */
// ====================================================================================================================

class BaseController extends Controller
{
	protected function setupLayout()
	{
		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}
}