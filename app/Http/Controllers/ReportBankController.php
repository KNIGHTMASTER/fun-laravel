<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseReport\AReportController;

class ReportBankController extends AReportController{

	public function getSourceReport(){
		return public_path().'/report/master-bank.jasper';
	}

	public function getIndexPage(){
		return 'pages.report.report-bank';
	}

	public function getOutputName(){
		return 'master-bank';
	}

	public function getRedirectPage(){
		return '/reporting';
	}

	public function getReportParameter(){
		return array();
	}
	
}