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

        $sfa = null;
        if ($loginResponse->getGroupId() == 1){
            $sfa = ModelFunctionAssignment::where(ApplicationConstant::STATUS, ApplicationConstant::EQUALS, 1)->orderBy('function_assigment_order', 'ASC')->get();
        }else{
            $sfa = ModelFunctionAssignment::where(ApplicationConstant::GROUP_ID, ApplicationConstant::EQUALS, $loginResponse->getGroupId())->orderBy('function_assigment_order', 'ASC')->get();
        }

        $assignedData = array();
        foreach ($sfa as $explodeData){            
            $sf = ModelFunction::where(ApplicationConstant::ID, ApplicationConstant::EQUALS, $explodeData[ApplicationConstant::FUNCTION_ID])->get();
            foreach ($sf as $subExplodedData){
                $subMenu = ModelFunction::where(ApplicationConstant::FUNCTION_PARENT_ID, ApplicationConstant::EQUALS, $subExplodedData->id)->get();
                                            
                foreach ($subMenu as $subMenuCheck) {
                    $isAssigned = ModelFunctionAssignment::where(ApplicationConstant::FUNCTION_ID, ApplicationConstant::EQUALS, $subMenuCheck[ApplicationConstant::ID])->get();
                    foreach ($isAssigned as $assigned) {                        
                        if ($assigned->group_id != 1){
                            $assignedData[] = $subMenuCheck;
                        }
                    }
                }
                if ($loginResponse->getGroupId() != 1){
$response[] = [
                    ApplicationConstant::CODE => $subExplodedData->code,
                    ApplicationConstant::NAME => $subExplodedData->name,
                    ApplicationConstant::LINK => $subExplodedData->function_url,
                    ApplicationConstant::STYLE => $subExplodedData->function_style,
                    ApplicationConstant::ORDER => $subExplodedData->function_order,
                    ApplicationConstant::LEVEL => $subExplodedData->function_level,
                    ApplicationConstant::PARENT => $subExplodedData->function_parent_id,
                    ApplicationConstant::SUB_MENU => $assignedData
                ];
                }else{
                    $response[] = [
                    ApplicationConstant::CODE => $subExplodedData->code,
                    ApplicationConstant::NAME => $subExplodedData->name,
                    ApplicationConstant::LINK => $subExplodedData->function_url,
                    ApplicationConstant::STYLE => $subExplodedData->function_style,
                    ApplicationConstant::ORDER => $subExplodedData->function_order,
                    ApplicationConstant::LEVEL => $subExplodedData->function_level,
                    ApplicationConstant::PARENT => $subExplodedData->function_parent_id,
                    ApplicationConstant::SUB_MENU => $subMenu
                ];
                }
                $assignedData = array();                
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