<?php
/**
 * @package App\Http\Controllers\Auth
 * @since 5/16/2016 - 7:59 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers\Auth;


use App\ConstantValue\ApplicationConstant;
use App\Dto\Response\BaseResponseDto;
use App\Dto\Response\LoginResponseDto;
use App\Model\ModelFunction;
use App\Model\ModelFunctionAssignment;

class MenuGenerator
{

    function generateMenuResponse($p_Data)
    {
        $response = array();
        $loginResponse = new LoginResponseDto();
        $loginResponse->setUserCode($p_Data[ApplicationConstant::USER_CODE]);
        $loginResponse->setGroupId($p_Data[ApplicationConstant::GROUP_ID]);
        $baseResponse = $this->generateBaseSuccessResponse(ApplicationConstant::SECURITY_USER_MODEL_NAME);
        $loginResponse->setStatusCode($baseResponse->getStatusCode());
        $loginResponse->setMessage($baseResponse->getMessage());
        $loginResponse->setDescription($baseResponse->getDescription());

        $sfa = ModelFunctionAssignment::where(ApplicationConstant::GROUP_ID, ApplicationConstant::EQUALS, $loginResponse->getGroupId())->orderBy('function_assigment_order', 'ASC')->get();
        foreach ($sfa as $explodeData){
            $sf = ModelFunction::where(ApplicationConstant::ID, ApplicationConstant::EQUALS, $explodeData[ApplicationConstant::FUNCTION_ID])->get();
            foreach ($sf as $subExplodedData){
                $parentData = ModelFunction::where(ApplicationConstant::FUNCTION_PARENT_ID, ApplicationConstant::EQUALS, $subExplodedData->id)->get();
                $response[] = [
                    ApplicationConstant::CODE => $subExplodedData->code,
                    ApplicationConstant::NAME => $subExplodedData->name,
                    ApplicationConstant::LINK => $subExplodedData->function_url,
                    'style' => $subExplodedData->function_style,
                    ApplicationConstant::ORDER => $subExplodedData->function_order,
                    ApplicationConstant::LEVEL => $subExplodedData->function_level,
                    ApplicationConstant::PARENT => $subExplodedData->function_parent_id,
                    'sub_menu' => $parentData
                ];
            }
        }
        $loginResponse->setItem($response);        
        //print(response()->json($loginResponse));
        return $loginResponse;
    }

    function generateBaseSuccessResponse($p_SuccessData)
    {
        $response = new BaseResponseDto();
        $response->setStatusCode(200);
        $response->setDescription('success');
        $response->setMessage($p_SuccessData);
        return $response;
    }

}