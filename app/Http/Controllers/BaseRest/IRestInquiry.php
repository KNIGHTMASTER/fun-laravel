<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 12/30/2015
 * Time: 5:43 PM
 */

namespace App\Http\Controllers\BaseRest;


interface IRestInquiry
{
    function selectAll();

    function selectByName($p_EntityName);

    function selectByCode($p_EntityCode);

    function actionSelect($p_Data);

    function pageAble();

    function pageKeySelector($p_Data);

}