<?php

namespace App\Util;

/**
 * @since 4/19/2016 - 4:10 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
class GeneralConverter
{

    public function getFormatIDR($p_RawData, $p_DecimalNumber){    	
		$decimalSeparator =".";
		$thousandSeparator =",";
 
		return "IDR " .number_format($p_RawData, $p_DecimalNumber, $decimalSeparator, $thousandSeparator);
    }
}