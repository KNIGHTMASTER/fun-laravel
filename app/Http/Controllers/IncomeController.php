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
use App\Util\CodeGenerator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Request;
use App\Util\generalValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Lov\BankLOV;
use App\Http\Controllers\Lov\SavingLOV;
use App\Model\ModelSaving;
use App\Model\ModelSavingHistory;
use DB;
use Illuminate\Database\Eloquent\Collection;

class IncomeController extends ABaseScaffold
{

    public function create()
    {           
            $entityName = $this->entityName;
            $entityBaseUrl = $this->entityBaseUrl;
            $pageTitle = $this->pageTitle;
            $pageSubTitle = $this->pageSubTitle;
            $bank = new BankLOV();
            $bank = $bank->generateLOV();
            $source = new SavingLOV();
            $source = $source->generateLOV();            
            $menuList = $this->menuList;        
            $userName = $this->userName;
            $sourceValue = '';
                return View::make(
                $this->getCreatePage(),
                compact(
                    'bank',
                    'source',
                    'sourceValue',
                    'entityName',
                    'entityBaseUrl',
                    'pageTitle',
                    'pageSubTitle',
                    'menuList',
                    'userName'
                )
            );        
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), $this->getStoreValidation());
        if($validator->fails()){
            return Redirect::to($this->entityBaseUrl.'/create')
                ->withInput(Input::all())
                ->withErrors($validator);
        }else{
            $dataIncome = Request::all();
            //print(response()->json($dataIncome));            
            $dataIncome = $this->getFormatValidation($dataIncome);                    
            //print(response()->json($dataIncome));
            $codeGenerator = new CodeGenerator();
            $codeResult = $codeGenerator->generate(6, ModelIncome::all());
            $dataIncome[ApplicationConstant::CODE] = $codeResult;
            $totalLastIncome = 0;
            try{
                DB::beginTransaction();
                $this->storeProcess($dataIncome);
                DB::commit();

                $lastIncome = ModelIncome::orderBy(ApplicationConstant::TIMESTAMP, ApplicationConstant::DESC)->first();
                DB::beginTransaction();
                $lastIncomeValue = ModelSaving::where(ApplicationConstant::BANK_SAVING, ApplicationConstant::EQUALS, $dataIncome[ApplicationConstant::BANK_INCOME])->first();
                $totalLastIncome += $lastIncomeValue->amount;
                $totalLastIncome += $dataIncome[ApplicationConstant::AMOUNT];
                $lastIncomeValue->update([ApplicationConstant::AMOUNT=>$totalLastIncome]);

                //Save to Saving History
                $lastIncomeValue->amount = $dataIncome[ApplicationConstant::AMOUNT];
                $lastIncomeValue->name = $dataIncome[ApplicationConstant::NAME];
                $lastIncomeValue->description = $dataIncome[ApplicationConstant::DESCRIPTION];
                $lastIncomeValue->code = $dataIncome[ApplicationConstant::CODE];
                $lastIncomeValue->bank_saving = $dataIncome[ApplicationConstant::BANK_INCOME];
                $lastIncomeValue->trx_type = 1;
                $lastIncomeValue->trx_income_id = $lastIncome[ApplicationConstant::ID];
                ModelSavingHistory::create($lastIncomeValue->toArray());

                DB::commit();
            }catch (\Exception $e){
                DB::rollback();
                throw $e;
            }
            
             Session::flash('message', 'Successfully created '.$this->getEntityName());
             return Redirect::to($this->entityBaseUrl);
        }
    }

    public function getStoreValidation(){
        $rules = array(
            ApplicationConstant::NAME => ApplicationConstant::REQUIRED,
            ApplicationConstant::AMOUNT => ApplicationConstant::REQUIRED
        );
        return $rules;
    }

    public function getFormatValidation($p_Data){
        $generalValidation = new generalValidation();
        if (! is_null($p_Data[ApplicationConstant::AMOUNT])){
            $p_Data[ApplicationConstant::AMOUNT] = $generalValidation->getSimpleNumericFormat($p_Data[ApplicationConstant::AMOUNT]);
        }
        if (is_null($p_Data[ApplicationConstant::BANK_INCOME])){
            $p_Data[ApplicationConstant::BANK_INCOME] = null;
        }
        return $p_Data;
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