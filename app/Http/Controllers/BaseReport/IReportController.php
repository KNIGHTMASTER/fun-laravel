<?php

/**
 * @package fun-laravel\Http\Controllers\BaseReport
 * @since 1/25/2016 - 7:14 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers\BaseReport;

interface IReportController{
	
	public function createPDFReport();

    public function createEXCELReport();

    public function getSourceReport();

    public function getIndexPage();

    public function getRedirectPage();

    public function getOutputName();    

    public function getReportParameter();
}