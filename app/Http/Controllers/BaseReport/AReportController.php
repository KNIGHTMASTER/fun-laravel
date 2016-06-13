<?php

namespace App\Http\Controllers\BaseReport;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;

abstract class AReportController extends Controller{
	
	protected $sourceReport;

	protected $redirectPage = '/reporting';

	protected $indexPage = '/reporting';

	protected $configurationDatabase;

	protected $outputName = 'report';

	protected $ext = 'pdf';

	protected $output;

	protected $outputFile;

	public function __construct(){
		$this->configurationDatabase = Config::get('database.connections.mysql');		
		$this->output = public_path().'/report/'.time().'_'.$this->outputName;
		$this->outputFile = $this->output.'.'.$this->ext;
	}

	public function createReport(){		
		$jasperPHP = new JasperPHP;

		/*print('output :'.$this->output);
		print('outputFile : '.$this->outputFile);
		print('sourceReport : '.$this->sourceReport);*/

		$jasperPHP->process(
            $this->sourceReport, 
            $this->output,
            array($this->ext),
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
}