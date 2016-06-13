<?php

namespace App\Util;
use App\ConstantValue\ApplicationConstant;

/**
 * @since 4/19/2016 - 4:10 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
class GeneralValidation
{

    public function getValidDateForInsertDatabase($p_Input){
        return date(ApplicationConstant::GENERIC_DATE_FORMAT, strtotime($p_Input));
    }

    public function geValidDateForTimeStamp($p_Input){
    	return date(ApplicationConstant::TIMESTAMP_DATE_FORMAT, strtotime($p_Input));
    }

    public function getSimpleNumericFormat($p_Input){
    	return preg_replace("/[^0-9]/", '', $p_Input);
    }
}