<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 12/30/2015
 * Time: 5:43 PM
 */

namespace App\Http\Controllers\BaseRest;


interface IRestSecurity
{
    function doLogin();

    function executeLogin($p_UserData);

    function doLogout();

    function executeLogout($p_UserData);

    function generateMenuResponse($p_Data);

}