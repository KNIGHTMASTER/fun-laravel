<?php

namespace App\Util;

use App\ConstantValue\ApplicationConstant;

class CodeGenerator{

	/**
 	 * { Create a random string }
 	 *
 	 * @param      integer  $length  The length
 	 *
 	 * @return     string   ( description_of_the_return_value )
 	*/
	public function generate($length = 6, $existingCode) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		if (strlen($str) == 0 || is_null($str)){
					generate(6, $existingCode);
					break;
		}else {
			foreach ($existingCode as $key => $value) {
				if ($value[ApplicationConstant::CODE] == $str ){
					$this->generate(6, $existingCode);
					break;
				}					
			}
		}
		return $str;
	}

}