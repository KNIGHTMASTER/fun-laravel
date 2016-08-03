<?php

namespace App\Util;
use App\ConstantValue\ApplicationConstant;

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

	public function getFormatDate_Ymd($p_Input){
		return date(ApplicationConstant::GENERIC_DATE_FORMAT, strtotime($p_Input));
	}

	public function getFormatTimeStamp_YmdHis($p_Input){
		return date(ApplicationConstant::TIMESTAMP_DATE_FORMAT, strtotime($p_Input));
	}

    public function getFormatDate_ddMMyyyy($p_Input){
        return date(ApplicationConstant::FORMAT_DATE_DD_MM_YYYY, strtotime($p_Input));
    }

	public function getSimpleNumericFormat($p_Input){
		return preg_replace("/[^0-9]/", '', $p_Input);
	}
}