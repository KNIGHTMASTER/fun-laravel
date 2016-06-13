<?php
/**
 * @package App\Http\Controllers
 * @since 4/26/2016 - 3:41 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;


use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseRest\ARestController;
use Request;
use App\Model\ModelBank;

class RestBankController extends ARestController
{

    function explodeDataToJsonArray($p_Data)
    {

        $response = [
            ApplicationConstant::BANK_MODEL_NAME=> []
        ];
        foreach ($p_Data as $explodedData) {
            $response[ApplicationConstant::BANK_MODEL_NAME][] = [
                ApplicationConstant::ID => $explodedData->id,
                ApplicationConstant::CODE => $explodedData->code,
                ApplicationConstant::NAME => $explodedData->name,
                ApplicationConstant::DESCRIPTION => $explodedData->description,
            ];
        }
        return $response;
    }

    function selectAll()
    {
        $data = ModelBank::all();
        $response = $this->actionSelect($this->explodeDataToJsonArray($data));
        return response()->json($response, $response->getStatusCode());
    }

    function selectByName($p_EntityName)
    {
        $data = ModelBank::where(ApplicationConstant::NAME, ApplicationConstant::LIKE, ApplicationConstant::PERCENTAGE . $p_EntityName . ApplicationConstant::PERCENTAGE)->get();
        $response = $this->actionSelect($this->explodeDataToJsonArray($data));
        return response()->json($response, $response->getStatusCode());
    }

    function selectByCode($p_EntityCode)
    {
        $data = ModelBank::where(ApplicationConstant::CODE, ApplicationConstant::LIKE, ApplicationConstant::PERCENTAGE . $p_EntityCode. ApplicationConstant::PERCENTAGE)->get();
        $response = $this->actionSelect($this->explodeDataToJsonArray($data));
        return response()->json($response, $response->getStatusCode());
    }

    function pageAble()
    {
        $input = Request::json()->all();
        $this->pageKeySelector($input);
        if((!($this->dtoPaging->getFilterKey() == NULL && $this->dtoPaging->getFilterValue() == NULL)) && ($this->dtoPaging->getSortingKey() == NULL && $this->dtoPaging->getSortingDirection() == NULL)){
            $result =
                ModelBank::where($this->dtoPaging->getFilterKey(), ApplicationConstant::LIKE, ApplicationConstant::PERCENTAGE . $this->dtoPaging->getFilterValue() . ApplicationConstant::PERCENTAGE)->paginate($this->dtoPaging->getItemNumber());
        }else if(($this->dtoPaging->getFilterKey() == NULL && $this->dtoPaging->getFilterValue() == NULL) && (!($this->dtoPaging->getSortingKey() == NULL && $this->dtoPaging->getSortingDirection() == NULL))){
            $result =
                ModelBank::orderBy($this->dtoPaging->getSortingKey(), $this->dtoPaging->getSortingDirection())->paginate($this->dtoPaging->getItemNumber());
        }else if((!($this->dtoPaging->getFilterKey() == NULL && $this->dtoPaging->getFilterValue() == NULL)) && (!($this->dtoPaging->getSortingKey() == NULL && $this->dtoPaging->getSortingDirection() == NULL))){
            $result =
                ModelBank::where($this->dtoPaging->getFilterKey(), ApplicationConstant::LIKE, ApplicationConstant::PERCENTAGE . $this->dtoPaging->getFilterValue() . ApplicationConstant::PERCENTAGE)
                    ->orderBy($this->dtoPaging->getSortingKey(), $this->dtoPaging->getSortingDirection())->paginate($this->dtoPaging->getItemNumber());
        }else{
            $result =
                ModelBank::paginate($this->dtoPaging->getItemNumber());
        }
        return $result;
    }

    function insert()
    {
        $p_Entity = (object)Request::json()->all();
        if(is_null($p_Entity)){
            return response()->json($this->generateBaseFailedResponse(), $this->statusCode);
        }else{
            $p_Entity = $this->classCaster->cast(get_class(new ModelBank()), $p_Entity);
            $p_Entity->save();
            return response()->json($this->generateBaseSuccessResponse($p_Entity[ApplicationConstant::NAME]), $this->statusCode);
        }
    }

    function update()
    {
        $p_Entity = (object)Request::json()->all();
        if(is_null($p_Entity)){
            return response()->json($this->generateBaseFailedResponse(), $this->statusCode);
        }else{
            $p_Entity = $this->classCaster->cast(get_class(new ModelBank()), $p_Entity);
            $newData = ModelBank::find($p_Entity[ApplicationConstant::ID]);
            $newData->code = $p_Entity[ApplicationConstant::CODE];
            $newData->name = $p_Entity[ApplicationConstant::NAME];
            $newData->description = $p_Entity[ApplicationConstant::DESCRIPTION];
            $newData->save();
            return response()->json($this->generateBaseSuccessResponse($p_Entity[ApplicationConstant::NAME]), $this->statusCode);
        }
    }

    function delete()
    {
        $input = Request::json()->all();
        $data = ModelBank::find($input[ApplicationConstant::ID]);
        if(is_null($data)){
            return response()->json($this->generateBaseFailedResponse(), $this->statusCode);
        }else{
            $deletedData = $data;
            $data->delete();
            return response()->json($this->generateBaseSuccessResponse($deletedData->id), $this->statusCode);
        }
    }
}