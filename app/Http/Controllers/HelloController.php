<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 2/22/2016
 * Time: 4:44 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HelloController extends Controller{

    public function hello(){
        $name = 'Fauzi';
        return View::make('greeting')->with('name', $name);
    }
}