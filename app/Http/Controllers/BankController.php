<?php
/**
 * @package app\Http\Controllers
 * @since 2/24/2016 - 10:48 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\AdminController;
use App\Model\ModelBank;
use App\Util\GeneralConverter;
use Illuminate\Http\Response;

class BankController extends AdminController
{

    public function getEntityName()
    {
        return ApplicationConstant::BANK_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::BANK_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelBank::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelBank::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::BANK_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::BANK_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::BANK_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelBank::create($p_Data);
}

    public function getEditPage()
    {
        return ApplicationConstant::BANK_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelBank::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}