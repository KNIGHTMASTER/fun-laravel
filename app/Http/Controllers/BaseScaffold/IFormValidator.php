<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 3/1/2016
 * Time: 10:16 PM
 */

namespace App\Http\Controllers\BaseScaffold;


interface IFormValidator
{

    function getStoreValidation();

    function getFormatValidation($p_Data);
}