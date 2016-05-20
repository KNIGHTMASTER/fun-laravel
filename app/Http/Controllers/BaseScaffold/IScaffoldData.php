<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 2/29/2016
 * Time: 9:18 PM
 */

namespace app\Http\Controllers\BaseScaffold;


interface IScaffoldData
{
    function getAllData();

    function getSingleData($p_Id);

    function getSearchData($p_SearchField, $p_SearchKey);
}