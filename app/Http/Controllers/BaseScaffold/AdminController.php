<?php
/**
 * @package App\Http\Controllers
 * @since 5/23/2016 - 13:54 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Http\Controllers\BaseScaffold;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

abstract class AdminController extends ABaseScaffold{
	
	/**
	 * { auth var }
	 *	0 == authenticated
	 *	-1 == not authenticated
	 * @var        integer
	 */
	public $isAuthorized = -1;

	public $redirectPage;

	private $currentActiveUser;

	/**
	 * <p>AdminController Constructor</p>
	 * <p>
	 * 		If user is authenticated then continue to target page.
	 * 		Otherwise redirect into unauthorized page
	 * </p>
	 */
	public function __construct(){
		if (Auth::check()) {
            $this->currentActiveUser = Auth::user();
            if ($this->currentActiveUser->group_id == 1){
				$this->isAuthorized = 0;
				parent::__construct();
			}else {
				$this->isAuthorized = -1;
				$this->redirectPage = 'unauthorized';			
			}
        }		
		
	}

	public function checkRole(){
		return $this->isAuthorized;
	}

	public function redirectUnAuthorized(){
		return Redirect($this->redirectPage);
	}

	public function index()
	{
		if ($this->checkRole() == 0){
			return parent::index();
		}else{
			return $this->redirectUnAuthorized();
		}
	}
}