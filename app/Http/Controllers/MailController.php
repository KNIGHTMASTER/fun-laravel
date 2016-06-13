<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MailController extends Controller{
	
	public function index(){
		return View::make('sendmail');
	}

	public function post(){		
		$data = Input::all();
		Mail::queue('greeting', $data, function($message) {
    		$message->to('fauzi.knightmaster.achmad@gmail.com', 'Fauzi')->subject('Laravel 5.2 GMail App!');
		});
	}
}