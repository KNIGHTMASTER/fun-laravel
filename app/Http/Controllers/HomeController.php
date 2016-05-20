<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 2/22/2016
 * Time: 4:44 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\MenuGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller{

    private $currentUserLogin;
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->currentUserLogin = Auth::user();
    }

    public function init(){
        $this->currentUserLogin = Auth::user();
        $menuGenerator = new MenuGenerator();
        $menuList = $menuGenerator->generateMenuResponse($this->currentUserLogin);
        return View::make('home')->with('menuList', $menuList);
    }

    public function dashboard(){
        $menuGenerator = new MenuGenerator();
        $menuList = $menuGenerator->generateMenuResponse($this->currentUserLogin);
        return View::make('pages.dashboard')->with(
            array(
                'userName' => $this->currentUserLogin->name, 
                'menuList' => $menuList)
            );
    }
}