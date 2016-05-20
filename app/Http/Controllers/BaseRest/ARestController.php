<?php

namespace App\Http\Controllers\BaseRest;

use App\ConstantValue\ApplicationConstant;
use App\Dto\Entity\DTOPaging;
use App\Dto\Response\BaseResponseDto;
use App\Http\Controllers\Controller;
use App\Util\ClassCaster;
use App\Util\RestUtil;
use App\Dto\Response\GenericResponseDto;

abstract class ARestController extends Controller implements IRestController {

    private $restUtil;
    protected $classCaster;
    protected $statusCode;
    protected $dtoPaging;

    /**
     * ARestController constructor.
     */
    public function __construct()
    {
        $this->restUtil = new RestUtil();
        $this->classCaster = new ClassCaster();
        $this->dtoPaging = new DTOPaging();
        $this->statusCode = 200;
    }

    function generateGenericResponse($p_Data) {
        $response = new GenericResponseDto();
        try {
            $response->setData($p_Data);
            $response->setStatusCode($this->statusCode);
            $response->setMessage("Success");
            $response->setDescription("Success select all data");            
        } catch (Exception $e) {
            $response->statusCode = 400;
            $response->setData(NULL);
            $response->setMessage($e);
            $response->setDescription("Error select data");
        } finally {
            return $response;
        }        
    }

    function generateBaseSuccessResponse($p_SuccessData)
    {
        $response = new BaseResponseDto();
        $response->setStatusCode($this->statusCode);
        $response->setDescription('success');
        $response->setMessage($p_SuccessData);
        return $response;
    }

    function generateBaseFailedResponse()
    {
        $response = new BaseResponseDto();
        $response->setStatusCode($this->statusCode);
        $response->setDescription('data is not found');
        $response->setMessage(ApplicationConstant::STRING_EMPTY);
        return $response;
    }


    public function actionSelect($data) {
        return $this->generateGenericResponse($data);
    }

    function insertCollection($p_CollectionEntity)
    {
        // TODO: Implement insertCollection() method.
    }

    function deleteCollection($p_CollectionEntity)
    {
        // TODO: Implement deleteCollection() method.
    }


    function pageKeySelector($p_Data)
    {
        $this->dtoPaging->setItemNumber($p_Data[ApplicationConstant::ITEM_NUMBER]);
        $this->dtoPaging->setFilterKey($p_Data[ApplicationConstant::FILTER_KEY]);
        $this->dtoPaging->setFilterValue($p_Data[ApplicationConstant::FILTER_VALUE]);
        $this->dtoPaging->setSortingKey($p_Data[ApplicationConstant::SORTING_KEY]);
        $this->dtoPaging->setSortingDirection($p_Data[ApplicationConstant::SORTING_DIRECTION]);
    }

}
