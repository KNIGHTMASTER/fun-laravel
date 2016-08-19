<?php
/**
 * @package App\Http\Controllers
 * @since 2/29/2016 - 9:15 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */


namespace App\Http\Controllers\BaseScaffold;

use App\ConstantValue\ApplicationConstant;
use App\Util\GeneralConverter;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Auth\MenuGenerator;
use Illuminate\Support\Facades\Auth;

/**
 * Class ABaseScaffold
 * <p>
 *      Basic Scaffolding without custom List of Value etc..
 * </p>
 * @package App\Http\Controllers
 */
abstract class ABaseScaffold extends Controller implements 
    IScaffoldView, 
    IScaffoldAction, 
    IScaffoldData, 
    IFormValidator
{
    protected $allData;
    protected $entityName;
    protected $entityBaseUrl;
    protected $pageTitle;
    protected $pageSubTitle;
    protected $columnHeaders;
    protected $databaseFields;
    protected $sortableFields;    
    protected $menuList;
    protected $userName;

    private $menuGenerator;

    /**
     * 1 = enabled
     * 0 = disabled
     * 
     * Enable/ Disable action button in Table 
     * @var        array
     */
    protected $tableAction = ['show'=>1, 'edit'=>1, 'delete'=>1];
    
    /**
     * 1 = enabled
     * 0 = disabled
     * Enable/ Disable action button in Table Header
     * @var        array
     */
    protected $headerAction = ['search'=>1, 'create'=>1];

    /**
     * Enable/ Disable action header in table
     * @var        integer
     */
    protected $actionColumnHeader = 1;

    /**
     * ABaseScaffold constructor.
     */
    public function __construct()
    {
        $this->allData = $this->getAllData();
        $this->entityName = $this->getEntityName();
        $this->entityBaseUrl = strtolower(str_replace(" ", "-", $this->entityName));
        $this->pageTitle = $this->getPageTitle();
        $this->pageSubTitle = $this->getPageSubTitle();
        $this->columnHeaders = $this->getColumnHeaders();
        $this->databaseFields = $this->getDatabaseFields();
        $this->sortableFields = $this->getSortableFields();
        $this->menuGenerator = new MenuGenerator();        
        if (Auth::check()) {
            $this->menuList = $this->menuGenerator->generateMenuResponse(Auth::user());
            $this->userName = Auth::user()->name;
        }
        
    }


    /**
     * Store a newly created resource in storage
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->getStoreValidation());
        if($validator->fails()){
            return Redirect::to($this->entityBaseUrl.'/create')
                ->withInput(Input::all())
                ->withErrors($validator);
        }else{
            $data = Request::all();
            $data = $this->getFormatValidation($data);
            $this->storeProcess($data);
            Session::flash('message', 'Successfully created '.$this->getEntityName());
            return Redirect::to($this->entityBaseUrl);
        }
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->getStoreValidation());
        if ($validator->fails()){
            return Redirect::to($this->entityBaseUrl.'/'.$id.'/edit')
                ->withInput(Input::all())
                ->withErrors($validator);
        }else{
            $dataUpdate = Request::all();
            $data = $this->getSingleData($id);
            $dataUpdate = $this->getFormatValidation($dataUpdate);            
            $data->update($dataUpdate);
            return Redirect($this->entityBaseUrl);
        }
    }

    public function destroy($id)
    {
        $dataToDelete = $this->getSingleData($id);
        $dataToDelete->delete();

        return Redirect($this->entityBaseUrl);
    }

    public function index()
    {
        $allData = $this->allData;
        $entityName = $this->entityName;
        $entityBaseUrl = $this->entityBaseUrl;
        $pageTitle = $this->pageTitle;
        $pageSubTitle = $this->pageSubTitle;
        $columnHeaders = $this->columnHeaders;
        $databaseFields = $this->databaseFields;
        $sortableFields = $this->sortableFields;
        $menuList = $this->menuList;
        $userName = $this->userName;
        $tableAction = $this->tableAction;
        $headerAction = $this->headerAction;
        $actionColumnHeader = $this->actionColumnHeader;
        return view(
            $this->getIndexPage(),
            compact(
                'pageTitle',
                'pageSubTitle',
                'allData',
                'columnHeaders',
                'databaseFields',
                'sortableFields',
                'entityName',
                'entityBaseUrl',
                'menuList',
                'userName',
                'tableAction',
                'headerAction',
                'actionColumnHeader'
            )
        );
    }

    public function create()
    {
        $entityName = $this->entityName;
        $entityBaseUrl = $this->entityBaseUrl;
        $pageTitle = $this->pageTitle;
        $pageSubTitle = $this->pageSubTitle;
        $menuList = $this->menuList;
        $userName = $this->userName;
        return View::make(
            $this->getCreatePage(),
            compact(
                'entityName',
                'entityBaseUrl',
                'pageTitle',
                'pageSubTitle',
                'menuList',
                'userName'
            )
        );
    }

    public function search($p_SearchField, $p_SearchKey)
    {
        $allData = $this->getSearchData($p_SearchField, $p_SearchKey);
        $entityName = $this->entityName;
        $entityBaseUrl = $this->entityBaseUrl;
        $pageTitle = $this->pageTitle;
        $pageSubTitle = $this->pageSubTitle;
        $columnHeaders = $this->columnHeaders;
        $databaseFields = $this->databaseFields;
        $sortableFields = $this->sortableFields;
        $menuList = $this->menuList;
        $userName = $this->userName;
        $actionColumnHeader = $this->actionColumnHeader;
        $tableAction = $this->tableAction;
        $headerAction = $this->headerAction;
        return view(
            $this->getIndexPage(),
            compact(
                'pageTitle',
                'pageSubTitle',
                'allData',
                'columnHeaders',
                'databaseFields',
                'sortableFields',
                'entityName',
                'entityBaseUrl',
                'menuList',
                'userName',
                'actionColumnHeader',
                'tableAction',
                'headerAction'
            )
        );
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

    public function edit($id)
    {
        $data = $this->getSingleData($id);
        $pageTitle = $this->getPageTitle();
        $pageSubTitle = $this->getPageSubTitle();
        $entityName = $this->getEntityName();
        $entityBaseUrl = $this->entityBaseUrl;
        $menuList = $this->menuList;
        $userName = $this->userName;
        return view(
            $this->getEditPage(),
            compact(
                'data',
                'pageTitle',
                'pageSubTitle',
                'entityName',
                'entityBaseUrl',
                'menuList',
                'userName'
            )
        );
    }

    public function getPageTitle()
    {
        return ApplicationConstant::PAGE_TITLE_MASTER_DATA;
    }

    public function getColumnHeaders()
    {
        return [
            ApplicationConstant::SIMPLE_HEADER_ID,
            ApplicationConstant::SIMPLE_HEADER_CODE,
            ApplicationConstant::SIMPLE_HEADER_NAME,
            ApplicationConstant::SIMPLE_HEADER_DESCRIPTION
        ];
    }

    public function getDatabaseFields()
    {
        return [
            ApplicationConstant::ID,
            ApplicationConstant::CODE,
            ApplicationConstant::NAME,
            ApplicationConstant::DESCRIPTION
        ];
    }

    public function getSortableFields()
    {
        return [
            ApplicationConstant::STRING_EMPTY => ApplicationConstant::STRING_EMPTY,
            ApplicationConstant::CODE => ApplicationConstant::CODE,
            ApplicationConstant::NAME => ApplicationConstant::NAME
        ];
    }

    function getStoreValidation()
    {
        $rules = array(
            ApplicationConstant::CODE => ApplicationConstant::REQUIRED,
            ApplicationConstant::NAME => ApplicationConstant::REQUIRED
        );
        return $rules;
    }

    function getFormatValidation($p_Data)
    {
        return $p_Data;
    }

}