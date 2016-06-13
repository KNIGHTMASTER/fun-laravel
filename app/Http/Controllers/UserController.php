<?php
/**
 * @package App\Http\Controllers
 * @since 4/19/2016 - 10:21 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;


use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\AdminController;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Http\Controllers\Lov\SecurityGroupLOV;
use App\Model\ModelUser;
use App\Util\GeneralValidation;
use Illuminate\Support\Facades\View;

class UserController extends AdminController
{

    public function getEntityName()
    {
        return ApplicationConstant::USER_ENTITY_NAME;
    }

    public function getColumnHeaders()
    {
        return [
            ApplicationConstant::SIMPLE_HEADER_ID,
            ApplicationConstant::SIMPLE_HEADER_CODE,
            ApplicationConstant::SIMPLE_HEADER_NAME,
            ApplicationConstant::TABLE_COLUMN_EXPIRED_DATE
        ];
    }

    public function getDatabaseFields()
    {
        return [
            ApplicationConstant::ID,
            ApplicationConstant::USER_CODE,
            ApplicationConstant::NAME,
            ApplicationConstant::USER_EXPIRED_DATE
        ];
    }

    /*public function getSortableFields()
    {
        return [
            ApplicationConstant::STRING_EMPTY => ApplicationConstant::STRING_EMPTY,
            ApplicationConstant::USER_CODE => ApplicationConstant::CODE,
            ApplicationConstant::NAME => ApplicationConstant::NAME
        ];
    }*/


    function getStoreValidation()
    {
        $rules = array(
            ApplicationConstant::USER_CODE => ApplicationConstant::REQUIRED,
            ApplicationConstant::NAME => ApplicationConstant::REQUIRED
        );
        return $rules;
    }


    public function getPageSubTitle()
    {
        return ApplicationConstant::USER_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelUser::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelUser::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::USER_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::USER_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::USER_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {
        ModelUser::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::USER_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelUser::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }

    public function create()
    {           
        if ($this->isAuthorized == 0){
            $entityName = $this->entityName;
            $entityBaseUrl = $this->entityBaseUrl;
            $pageTitle = $this->pageTitle;
            $pageSubTitle = $this->pageSubTitle;
            $group = new SecurityGroupLOV();
            $group = $group->generateLOV();
            $menuList = $this->menuList;        
            $userName = $this->userName;
                return View::make(
                $this->getCreatePage(),
                compact(
                    'group',
                    'entityName',
                    'entityBaseUrl',
                    'pageTitle',
                    'pageSubTitle',
                    'menuList',
                    'userName'
                )
            );
        }else {
            return parent::redirectUnAuthorized();
        }
        
    }

    public function show($id)
    {
        if ($this->isAuthorized == 0){
            $data = $this->getSingleData($id);
            $entityName = $this->entityName;
            $entityBaseUrl = $this->entityBaseUrl;
            $pageTitle = $this->pageTitle;
            $pageSubTitle = $this->pageSubTitle;
            $securityGroupLOV = new SecurityGroupLOV();
            $data->group_id = $securityGroupLOV->getValue($data->group_id);
            $menuList = $this->menuList;
            $userName = $this->userName;
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
        }else {
            return parent::redirectUnAuthorized();
        }
    }

    public function edit($id)
    {
        if ($this->isAuthorized == 0){
            $data = $this->getSingleData($id);
            $pageTitle = $this->getPageTitle();
            $pageSubTitle = $this->getPageSubTitle();
            $entityName = $this->getEntityName();
            $entityBaseUrl = $this->entityBaseUrl;
            $group = new SecurityGroupLOV();
            $group = $group->generateLOV();
            $menuList = $this->menuList;
            $userName = $this->userName;
            return view(
                $this->getEditPage(),
                compact(
                    'data',
                    'group',
                    'pageTitle',
                    'pageSubTitle',
                    'entityName',
                    'entityBaseUrl',
                    'menuList',
                    'userName'
                )
            );
        }        
    }

    function getFormatValidation($p_Data)
    {
        $generalValidation = new GeneralValidation();
        try{
            /**
             * Hashing password if exist before insert
             */
            if ($p_Data[ApplicationConstant::PASSWORD] != null){
                $p_Data[ApplicationConstant::PASSWORD] = bcrypt($p_Data[ApplicationConstant::PASSWORD]);
            }
        }catch(\Exception $e){
            /**
             * Handling exception if password does not exist within form
             */
        }

        /**
         * Change Date Format for inserting need
         */
        if ($p_Data[ApplicationConstant::USER_EXPIRED_DATE] != null){
            $p_Data[ApplicationConstant::USER_EXPIRED_DATE] =
                $generalValidation->getValidDateForInsertDatabase($p_Data[ApplicationConstant::USER_EXPIRED_DATE]);
        }
        return $p_Data;
    }
}