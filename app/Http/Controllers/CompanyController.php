<?php
/**
 * @package App\Http\Controllers
 * @since 4/26/2016 - 11:31 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;


use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelCompany;

class CompanyController extends ABaseScaffold
{

    public function storeProcess($p_Data)
    {
        ModelCompany::create($p_Data);
    }

    function getAllData()
    {
        return ModelCompany::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelCompany::find($p_Id);
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelCompany::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::COMPANY_ENTITY_NAME;
    }

    public function getEntityName()
    {
        return ApplicationConstant::COMPANY_ENTITY_NAME;
    }

    public function getIndexPage()
    {
        return ApplicationConstant::COMPANY_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::COMPANY_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::COMPANY_CREATE_PAGE;
    }

    public function getEditPage()
    {
        return ApplicationConstant::COMPANY_EDIT_PAGE;
    }
}