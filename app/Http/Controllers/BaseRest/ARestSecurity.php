<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/25/2016
 * Time: 7:14 PM
 */

namespace App\Http\Controllers\BaseRest;

use App\ConstantValue\ApplicationConstant;
use App\Dto\Response\LoginResponseDto;
use App\Model\ModelSecurityFunction;
use App\Model\ModelSecurityFunctionAssignment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


abstract class ARestSecurity extends ARestController implements IRestSecurity
{

    function executeLogin($p_UserData)
    {
        if($p_UserData != null){
            Auth::login(Auth::user());
            $p_UserData->user_login_status = 1;
            if($p_UserData->user_first_login == null){
                $p_UserData->user_first_login = Carbon::now();
            }else{
                $p_UserData->user_last_login = Carbon::now();
            }
            $p_UserData->save();
            return response()->json($this->generateMenuResponse($p_UserData));
            //return response()->json($this->generateBaseSuccessResponse("Success Login"));
        }else{
            $p_UserData->user_failed_login = Carbon::now();
            $p_UserData->save();
            return response()->json($this->generateBaseFailedResponse());
        }
    }

    function executeLogout($p_UserData)
    {
        if($p_UserData != null){
            Auth::login(Auth::user());
            $p_UserData->user_login_status = 0;
            $p_UserData->save();
            return response()->json($this->generateBaseSuccessResponse("Success Logout"));
        }else{
            $p_UserData->save();
            return response()->json($this->generateBaseFailedResponse());
        }
    }

    function generateMenuResponse($p_Data)
    {
        //print_r($p_Data);
        $loginResponse = new LoginResponseDto();
        $loginResponse->setUserCode($p_Data[ApplicationConstant::USER_CODE]);
        $loginResponse->setGroupId($p_Data[ApplicationConstant::GROUP_ID]);
        $baseResponse = $this->generateBaseSuccessResponse(ApplicationConstant::SECURITY_USER_MODEL_NAME);
        $loginResponse->setStatusCode($baseResponse->getStatusCode());
        $loginResponse->setMessage($baseResponse->getMessage());
        $loginResponse->setDescription($baseResponse->getDescription());

        $sfa = ModelSecurityFunctionAssignment::where(ApplicationConstant::GROUP_ID, ApplicationConstant::EQUALS, $loginResponse->getGroupId())->get();
        foreach ($sfa as $explodeData){
            $sf = ModelSecurityFunction::where(ApplicationConstant::ID, ApplicationConstant::EQUALS, $explodeData[ApplicationConstant::FUNCTION_ID])->get();
            foreach ($sf as $subExplodedData){
                $parentData = ModelSecurityFunction::where(ApplicationConstant::FUNCTION_PARENT_ID, ApplicationConstant::EQUALS, $subExplodedData->id)->get();
                $response[] = [
                    ApplicationConstant::CODE => $subExplodedData->code,
                    ApplicationConstant::NAME => $subExplodedData->name,
                    ApplicationConstant::LINK => $subExplodedData->function_url,
                    ApplicationConstant::ORDER => $subExplodedData->function_order,
                    ApplicationConstant::LEVEL => $subExplodedData->function_level,
                    ApplicationConstant::PARENT => $subExplodedData->function_parent_id,
                    ApplicationConstant::PARENT_ITEM => $parentData
                ];
            }
        }
        $loginResponse->setItem($response);
        return $loginResponse;
    }

}