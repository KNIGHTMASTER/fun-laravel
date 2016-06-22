<?php

namespace App\Http\Controllers\BaseReport;

use Illuminate\Support\Facades\View;
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
        $this->outputFile = $this->output.'.'.$this->extPDF;
        $this->jasperPHP->process(
            $this->getSourceReport(), 
            $this->output,
            array($this->extPDF),
            array(),
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
        return Redirect::to($this->redirectPage);
    }

    public function createEXCELReport(){
        $this->outputFile = $this->output.'.'.$this->extExcel;
    }    

    
}