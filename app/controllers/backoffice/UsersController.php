<?php
/**
 *  User management controller
 *
 * @author      Thierry 'Akarun' Lagasse <thierry@passtech.be>
 * @copyright   Copyright (c) 2013 Passtech.be - Thierry Lagasse (http://www.passtech.be)
 * @since       May 2013
 */
// ====================================================================================================================
namespace Backoffice;

use BaseController, View;

// --------------------------------------------------------------------------------------------------------------------

class UsersController extends BaseController
{
    /**
     *  Show list to manage users
     */
    public function getList()
    {
        return View::make('backoffice.users.list');
    }
}