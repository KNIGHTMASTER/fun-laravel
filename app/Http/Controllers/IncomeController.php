<?php
/**
 * @package app\Http\Controllers
 * @since 6/10/2016 - 3:51 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelIncome;
use Illuminate\Http\Response;

class IncomeController extends ABaseScaffold
{

    public function getColumnHeaders()
    {
        return [
            ApplicationConstant::SIMPLE_HEADER_ID,
            ApplicationConstant::SIMPLE_HEADER_CODE,
            ApplicationConstant::SIMPLE_HEADER_NAME,
            ApplicationConstant::AMOUNT,
            ApplicationConstant::SIMPLE_HEADER_DESCRIPTION
        ];
    }

    public function getDatabaseFields()
    {
        return [
            ApplicationConstant::ID,
            ApplicationConstant::CODE,
            ApplicationConstant::NAME,
            ApplicationConstant::AMOUNT,
            ApplicationConstant::DESCRIPTION
        ];
    }

    public function getEntityName()
    {
        return ApplicationConstant::INCOME_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::INCOME_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelIncome::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelIncome::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::INCOME_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::INCOME_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::INCOME_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelIncome::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::INCOME_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelIncome::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}