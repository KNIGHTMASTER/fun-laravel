<?php
/**
 * @package app\Http\Controllers
 * @since 6/6/2016 - 12:55 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelSaving;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\Util\GeneralConverter;

class SavingController extends ABaseScaffold
{

    protected $tableAction = ['show'=>1, 'edit'=>0, 'delete'=>0];

    public function selectAll(){
        $result = ModelSaving::all();
        return response()->json($result);
    }

    public function selectById($p_Id){
        $result = ModelSaving::where(ApplicationConstant::ID, ApplicationConstant::EQUALS, $p_Id)->first();
        if (!is_null($result)){
            $amount = $result->amount;
        }else{
            $amount = 0;
        }
        return $amount;
    }

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
        return ApplicationConstant::SAVING_ENTITY_NAME;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::SAVING_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelSaving::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelSaving::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::SAVING_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::SAVING_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::SAVING_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelSaving::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::SAVING_EDIT_PAGE;
    }

    public function show($id)
    {
        $data = $this->getSingleData($id);
        $entityName = $this->entityName;
        $entityBaseUrl = $this->entityBaseUrl;
        $pageTitle = $this->pageTitle;
        $pageSubTitle = $this->pageSubTitle;
        $menuList = $this->menuList;
        $userName = $this->userName;
        $generalConverter = new GeneralConverter();
        $data->amount = $generalConverter->getFormatIDR($data->amount, 2);
        return View::make(
            $this->getShowPage(),
            compact(
                'data',
                'pageSubTitle',
                'pageTitle',
                'entityName',
                'entityBaseUrl',
                'menuList',
                'userName'
            )
        );
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelSaving::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

}