<?php
/**
 * @package app\Http\Controllers
 * @since 6/1/2016 - 02:13 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers;

use App\ConstantValue\ApplicationConstant;
use App\Http\Controllers\BaseScaffold\ABaseScaffold;
use App\Model\ModelExpense;
use App\Model\ModelSavingHistory;
use App\Model\ModelSaving;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Util\CodeGenerator;
use App\Http\Controllers\Lov\BankLOV;
use App\Http\Controllers\Lov\SavingLOV;
use App\Http\Controllers\SavingController;
use App\Util\generalValidation;
use DB;

class ExpenseController extends ABaseScaffold{

	
	public function __construct(){		
		parent::__construct();
		$this->pageTitle = 'Balance';
        $this->tableAction = ['show'=>1, 'edit'=>1, 'delete'=>0];
	}

	public function getEntityName()
    {
        return ApplicationConstant::EXPENSE_ENTITY_NAME;
    }

    public function getColumnHeaders()
    {
        return [
            ApplicationConstant::SIMPLE_HEADER_CODE,
            ApplicationConstant::SIMPLE_HEADER_NAME,
            ApplicationConstant::TABLE_COLUMN_AMOUNT,
            ApplicationConstant::TABLE_COLUMN_TIMESTAMP
        ];
    }

    public function getDatabaseFields()
    {
        return [
            ApplicationConstant::CODE,
            ApplicationConstant::NAME,
            ApplicationConstant::AMOUNT,
            ApplicationConstant::TIMESTAMP
        ];
    }

    function getStoreValidation()
    {
        $rules = array(
            ApplicationConstant::NAME => ApplicationConstant::REQUIRED,
            ApplicationConstant::AMOUNT => ApplicationConstant::REQUIRED,
            ApplicationConstant::TIMESTAMP => ApplicationConstant::REQUIRED,
            ApplicationConstant::EXPENSE_SOURCE => ApplicationConstant::REQUIRED
        );
        return $rules;
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
            $bankLOV = new BankLOV();
            $savingLOV = new SavingLOV();            
            $data->bank = $bankLOV->getValue($data->bank_expense);
            $savingController = new SavingController();        
            $sourceValue = $savingController->selectById($data->expense_source);        
            $data->expense_source = $savingLOV->getValue($data->expense_source);
            return View::make(
                $this->getShowPage(),
                compact(
                    'data',
                    'sourceValue',
                    'pageSubTitle',
                    'pageTitle',
                    'entityName',
                    'entityBaseUrl',
                    'menuList',
                    'userName'
                )
            );        
    }

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
            $dataExpense = Request::all();
            $dataExpense = $this->getFormatValidation($dataExpense);            
            $codeGenerator = new CodeGenerator();
            $codeResult = $codeGenerator->generate(6, ModelExpense::all());
            $dataExpense[ApplicationConstant::CODE] = $codeResult;

            DB::beginTransaction();
            try{
                $this->storeProcess($dataExpense);
                DB::commit();

                $lastExpense = ModelExpense::orderBy(ApplicationConstant::TIMESTAMP, ApplicationConstant::DESC)->first();

                DB::beginTransaction();
                $dataSaving = ModelSaving::orderBy(ApplicationConstant::CREATED_ON, ApplicationConstant::DESC)->first();
            
                $currentSaving = $dataSaving->amount;
                $currentExpense = $currentSaving - $dataExpense[ApplicationConstant::AMOUNT];

                //Save to Single Saving Data              
                $dataSaving->update([ApplicationConstant::AMOUNT=>$currentExpense]);

                //Save to Saving History
                $dataSaving->amount = $dataExpense[ApplicationConstant::AMOUNT];
                $dataSaving->trx_expense_id = $lastExpense->id;                
                $dataSaving->name = $lastExpense->name;                
                $dataSaving->description = $lastExpense->description; 
                $dataSaving->code = $lastExpense->code;
                $dataSaving->bank_saving = $lastExpense->expense_source;
                $dataSaving->trx_type = 2;
                $dataSaving->trx_income_id = null;
                
                ModelSavingHistory::create($dataSaving->toArray());
                DB::commit();
            }catch(\Exception $e){
                DB::rollback();
                throw $e;
            }

            Session::flash('message', 'Successfully created '.$this->getEntityName());
            return Redirect::to($this->entityBaseUrl);
        }
    }

	public function edit($id)
    {
        $data = $this->getSingleData($id);
        $pageTitle = $this->getPageTitle();
        $pageSubTitle = $this->getPageSubTitle();
        $entityName = $this->getEntityName();
        $entityBaseUrl = $this->entityBaseUrl;
        $bank = new BankLOV();        
        $data->bank_expense = $bank->getValue($data->bank_expense_dest);
        $bank = $bank->generateLOV();        
        $source = new SavingLOV();                
        $source = $source->generateLOV();
        $savingController = new SavingController();        
        $sourceValue = $savingController->selectById($data->expense_source);        
        $menuList = $this->menuList;
        $userName = $this->userName;        
        return view(
        $this->getEditPage(),
            compact(
                'data',
                'source',
                'sourceValue',
                'bank',
                'pageTitle',
                'pageSubTitle',
                'entityName',
                'entityBaseUrl',
                'menuList',
                'userName'
            )
        );
    }

    public function getFormatValidation($p_Data){
    	$generalValidation = new generalValidation();
    	if (! is_null($p_Data[ApplicationConstant::TIMESTAMP])){
    			$p_Data[ApplicationConstant::TIMESTAMP] = $generalValidation->geValidDateForTimeStamp($p_Data[ApplicationConstant::TIMESTAMP]);
    	}
        if (! is_null($p_Data[ApplicationConstant::AMOUNT])){
            $p_Data[ApplicationConstant::AMOUNT] = $generalValidation->getSimpleNumericFormat($p_Data[ApplicationConstant::AMOUNT]);
        }
        if (! is_null($p_Data[ApplicationConstant::BANK_EXPENSE_DEST])){
            $p_Data[ApplicationConstant::BANK_EXPENSE_DEST] = null;
        }
    	return $p_Data;
    }

    public function getPageSubTitle()
    {
        return ApplicationConstant::EXPENSE_ENTITY_NAME;
    }

    function getAllData()
    {
        return ModelExpense::paginate(ApplicationConstant::DATA_PAGINATION);
    }

    function getSingleData($p_Id)
    {
        return ModelExpense::find($p_Id);
    }

    public function getIndexPage()
    {
        return ApplicationConstant::EXPENSE_INDEX_PAGE;
    }

    public function getShowPage()
    {
        return ApplicationConstant::EXPENSE_SHOW_PAGE;
    }

    public function getCreatePage()
    {
        return ApplicationConstant::EXPENSE_CREATE_PAGE;
    }

    public function storeProcess($p_Data)
    {    	
        ModelExpense::create($p_Data);
    }

    public function getEditPage()
    {
        return ApplicationConstant::EXPENSE_EDIT_PAGE;
    }

    function getSearchData($p_SearchField, $p_SearchKey)
    {
        $searchData = ModelExpense::where(
            $p_SearchField,
            ApplicationConstant::LIKE,
            ApplicationConstant::PERCENTAGE . $p_SearchKey . ApplicationConstant::PERCENTAGE
        )->paginate(ApplicationConstant::DATA_PAGINATION);;
        return $searchData;
    }	
}