<?php

namespace App\Http\Controllers\BaseReport;

use App\Util\GeneralConverter;
use Illuminate\Support\Facades\Input;
use Request;
use Illuminate\Support\Facades\Config;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Auth\MenuGenerator;
use Illuminate\Support\Facades\Auth;

abstract class AReportController extends Controller implements IReportController{

	protected $configurationDatabase;

	protected $extPDF = 'pdf';

    protected $extExcel = 'xls';

    protected $choosenExt;

	protected $output;

	protected $outputFile;

    protected $jasperPHP;

    protected $menuList;

    private $menuGenerator;

	public function __construct(){
        $this->menuGenerator = new MenuGenerator();
        if (Auth::check()) {
            $this->menuList = $this->menuGenerator->generateMenuResponse(Auth::user());
            $this->userName = Auth::user()->name;
            $this->configurationDatabase = Config::get('database.connections.mysql');       
            $this->output = public_path().'/report/'.time().'_'.$this->getOutputName();     
            $this->jasperPHP = new JasperPHP;
        }		
	}

    public function index()
    {
        $userName = $this->userName;
        $menuList = $this->menuList;
        return view($this->getIndexPage(),
            compact(
                'userName',
                'menuList'
            )
        );
    }

    public function createPDFReport(){
        $this->choosenExt = $this->extPDF;
        $param = Input::all();
        $this->generateFileReport2($param);
    }

    public function createEXCELReport(){
        $this->choosenExt = $this->extExcel;
        $this->generateFileReport();
    }    

    private function generateFileReport2($param){
        $generalConverter = new GeneralConverter();
//        $startDate = $generalConverter->getFormatTimeStamp_YmdHis($param['startDate']);
//        $endDate = $generalConverter->getFormatTimeStamp_YmdHis($param['endDate']);
        $startDate = $generalConverter->getFormatDate_ddMMyyyy($param['startDate']);
        $endDate = $generalConverter->getFormatDate_ddMMyyyy($param['endDate']);
        echo $startDate;
        echo '<br />';
        echo $endDate;
        echo '<br />';
        echo $this->getSourceReport();
        echo '<br />';
        echo $this->output;
        echo '<br />';
        echo $this->choosenExt;
        echo '<br />';
        print_r($this->configurationDatabase);

        $this->outputFile = $this->output.'.'.$this->choosenExt;
//        $this->jasperPHP->process(
//            $this->getSourceReport(),
//            $this->output,
//            array($this->choosenExt),
//            array(
//                "php_version" => phpversion(),
//                "startDate"=>$startDate,
//                "endDate"=>$endDate
//            ),
//            $this->configurationDatabase,
//            false,
//            false
//        )->execute();

        $this->jasperPHP->process(
            $this->getSourceReport(),
            $this->output,
            array($this->choosenExt),
            array(
//                "startDate" => $startDate,
//                "endDate" => $endDate
            ),
            $this->configurationDatabase
        )->execute();

        if (file_exists($this->outputFile)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($this->outputFile));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($this->outputFile));

            ob_clean();
            flush();
            readfile($this->outputFile);
            unlink($this->outputFile);
        }
        return Redirect::to($this->getRedirectPage());
    }

    private function generateFileReport(){
        $this->outputFile = $this->output.'.'.$this->choosenExt;
        $this->jasperPHP->process(
            $this->getSourceReport(), 
            $this->output,
            array($this->choosenExt),
            $this->getReportParameter(),
            $this->configurationDatabase,
            false,
            false
        )->execute();
        if (file_exists($this->outputFile)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($this->outputFile));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($this->outputFile));
            
            ob_clean();
            flush();
            readfile($this->outputFile);
            unlink($this->outputFile);
        }                               
        return Redirect::to($this->getRedirectPage());
    }

    public function getReportParameter(){
        return array();
    }
}