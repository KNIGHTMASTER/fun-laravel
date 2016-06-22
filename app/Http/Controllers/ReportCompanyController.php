<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseReport\AReportController;

class ReportCompanyController extends AReportController{

	public function getSourceReport(){
		return public_path().'/report/master-company.jasper';
	}

	public function getIndexPage(){
		return 'pages.report.report-company';
	}

	public function getOutputName(){
		return 'master-company';
	}

	public function getRedirectPage(){
		return '/reporting';
	}

	public function post(){
		return parent::createPDFReport();
	}	
}