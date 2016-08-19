<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Fun-Laravel']);
});

/*Route::get('unauthorized', function () {
    return view('errors/unauthorized-access');
});*/

Route::get('unauthorized', ['as' => 'unauthorized', function () {
    return view('errors/unauthorized-access');
}]);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Authentication routes*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*Registration routes*/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/sendmail', 'MailController@index');
Route::post('/sendmail', 'MailController@post');

/*Admin Routes*/
Route::group(['middleware' => 'auth'], function () {


    Route::get('home', 'HomeController@init');
    Route::get('dashboard', 'HomeController@dashboard');
    
    /**
     * Routes for Bank Data
     */
    Route::resource('/bank', 'BankController');
    Route::get('bank/{id}/destroy', 'BankController@destroy');
    Route::get('bank/search/{p_SearchField}/{p_SearchKey}', 'BankController@search');

    /**
     * Routes for User Data
     */
    Route::resource('/user', 'UserController');
    Route::get('user/{id}/destroy', 'UserController@destroy');
    Route::get('user/search/{p_SearchField}/{p_SearchKey}', 'UserController@search');

    /**
     * Routes for Group Data
     */
    Route::resource('/group', 'GroupController');
    Route::get('group/{id}/destroy', 'GroupController@destroy');
    Route::get('group/search/{p_SearchField}/{p_SearchKey}', 'GroupController@search');

    /**
     * Routes for Company Data
     */
    Route::resource('company', 'CompanyController');
    Route::get('company/{id}/destroy', 'CompanyController@destroy');
    Route::get('company/search/{p_SearchField}/{p_SearchKey}', 'CompanyController@search');
    
    /**
     * Routes for Branch Data
     */
    Route::resource('branch', 'BranchController');
    Route::get('branch/{id}/destroy', 'BranchController@destroy');
    Route::get('branch/search/{p_SearchField}/{p_SearchKey}', 'BranchController@search');

    /**
     * Routes for Expense
     */
    Route::resource('expense', 'ExpenseController');
    Route::get('expense/{id}/destroy', 'ExpenseController@destroy');
    Route::get('expense/search/{p_SearchField}/{p_SearchKey}', 'ExpenseController@search');

    /**
     * Routes for Income
     */
    Route::resource('income', 'IncomeController');
    Route::get('income/{id}/destroy', 'IncomeController@destroy');
    Route::get('income/search/{p_SearchField}/{p_SearchKey}', 'IncomeController@search');

    /**
     * Routes for Saving
     */
    Route::resource('saving', 'SavingController');
    Route::get('saving/{id}/destroy', 'SavingController@destroy');
    Route::get('saving/search/{p_SearchField}/{p_SearchKey}', 'SavingController@search');
    Route::get('saving/all', 'SavingController@selectAll');
    Route::get('saving/select/{id}', 'SavingController@selectById');

    /**
     * Routes for Saving History
     */
    Route::resource('saving-history', 'SavingHistoryController');
    Route::get('saving-history/{id}/destroy', 'SavingHistoryController@destroy');
    Route::get('saving-history/search/{p_SearchField}/{p_SearchKey}', 'SavingHistoryController@search');

    /**
     * Routes for Report Master Bank
     */
    Route::get('/report-bank', ['uses' =>'ReportBankController@index', 'as' => 'ReportBank']);
    Route::post('/report-bank-pdf', ['uses' =>'ReportBankController@createPDFReport']);
    Route::post('/report-bank-xls', ['uses' =>'ReportBankController@createEXCELReport']);

    Route::get('/report-company', ['uses' =>'ReportCompanyController@index', 'as' => 'ReportCompany']);
    Route::post('/report-company-pdf', ['uses' =>'ReportCompanyController@createPDFReport']);
    Route::post('/report-company-xls', ['uses' =>'ReportCompanyController@createEXCELReport']);

    Route::get('/report-expense', ['uses' =>'ReportExpenseController@index', 'as' => 'ReportExpense']);
    Route::post('/report-expense-pdf', ['uses' =>'ReportExpenseController@createPDFReport']);
    Route::post('/report-expense-xls', ['uses' =>'ReportExpenseController@createEXCELReport']);
});


Route::group(['middleware' => 'auth.basic'], function() {
    Route::group(array('prefix' => 'api/v1/bank'), function () {
        Route::get('select/all', 'RestBankController@selectAll');
        Route::get('select/name/{name}', 'RestBankController@selectByName');
        Route::get('select/code/{code}', 'RestBankController@selectByCode');
        Route::post('select/pageable', 'RestBankController@pageAble');
        Route::post('delete', 'RestBankController@delete');
        Route::post('insert', 'RestBankController@insert');
        Route::post('update', 'RestBankController@update');
        Route::post('deleteBulk', 'RestBankController@deleteBulk');
        Route::post('insertBulk', 'RestBankController@insertBulk');
    });
});
