<?php
/**
 * @package app\Http\Controllers
 * @since 13/6/2016 - 11:02 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelSavingHistory;
use Illuminate\Http\Response;

class SavingHistoryController extends ABaseScaffold
{

    protected $tableAction = ['show'=>1, 'edit'=>0, 'delete'=>0];

    protected $headerAction = ['search'=>1, 'create'=>0];

    public function getColumnHeaders()
    {
        return [
            ApplicationConstant::SIMPLE_HEADER_ID,
            ApplicationConstant::SIMPLE_HEADER_CODE,
            ApplicationConstant::SIMPLE_HEADER_NAME,
            ApplicationConstant::AMOUNT,
            ApplicationConstant::TRX_TYPE,
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
            ApplicationConstant::TRX_TYPE,           
            ApplicationConstant::DESCRIPTION
        ];
    }

    public function getEntityName()
    {
        return ApplicationConstant::SAVING_HISTORY_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::SAVING_HISTORY_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelSavingHistory::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelSavingHistory::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::SAVING_HISTORY_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::SAVING_HISTORY_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::SAVING_HISTORY_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelSavingHistory::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::SAVING_HISTORY_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelSavingHistory::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}