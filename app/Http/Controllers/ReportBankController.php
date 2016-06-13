<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BaseReport\AReportController;
use App\Http\Controllers\Auth\MenuGenerator;

class ReportBankController extends AReportController{

	protected $menuList;
	private $menuGenerator;

	public function __construct(){
		$this->sourceReport = public_path().'/report/master-bank.jasper';
		$this->outputName = 'master-bank';
		$this->menuGenerator = new MenuGenerator();
		if (Auth::check()) {
            $this->menuList = $this->menuGenerator->generateMenuResponse(Auth::user());
            $this->userName = Auth::user()->name;
        }
		parent::__construct();
	}
	

	public function index(){
		$userName = $this->userName;
		$menuList = $this->menuList;
		return view('pages.report.report-bank',
			compact(
                'userName',
                'menuList'
            )
		);
	}

	public function post(){
		return parent::createReport();
	}	
}