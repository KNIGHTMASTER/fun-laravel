<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 12/30/2015
 * Time: 5:46 PM
 */

namespace App\Http\Controllers\BaseRest;


interface IRestTransaction
{
    function insert();

    function insertCollection($p_CollectionEntity);

    function update();

    function delete();

    function deleteCollection($p_CollectionEntity);

}