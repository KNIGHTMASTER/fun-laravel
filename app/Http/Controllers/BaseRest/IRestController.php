<?php
namespace App\Http\Controllers\BaseRest;

/**
 *
 * @author Ladies Man
 */
interface IRestController extends IRestInquiry, IRestTransaction
{

    function generateGenericResponse($p_Data);

    function generateBaseSuccessResponse($p_SuccessData);

    function generateBaseFailedResponse();

    function explodeDataToJsonArray($p_Data);
    
}
