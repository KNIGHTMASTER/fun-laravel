<?php
/**
 * @package app\Http\Controllers
 * @since 2/24/2016 - 10:48 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelGroup;
use Illuminate\Http\Response;

class GroupController extends ABaseScaffold
{

    public function getEntityName()
    {
        return ApplicationConstant::GROUP_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::GROUP_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelGroup::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelGroup::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::GROUP_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::GROUP_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::GROUP_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelGroup::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::GROUP_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelGroup::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}