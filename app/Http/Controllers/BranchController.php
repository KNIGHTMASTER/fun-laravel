<?php
/**
 * @package app\Http\Controllers
 * @since 5/24/2016 - 06:60 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelBranch;
use Illuminate\Http\Response;

class BranchController extends ABaseScaffold
{

    public function getEntityName()
    {
        return ApplicationConstant::BRANCH_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::BRANCH_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelBranch::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelBranch::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::BRANCH_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::BRANCH_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::BRANCH_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelBranch::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::BRANCH_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelBranch::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}