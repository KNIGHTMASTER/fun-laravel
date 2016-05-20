<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/12/2016
 * Time: 11:05 AM
 */

namespace app\ConstantValue;


interface ShiftModelKey extends MerchandiseModelKey
{
    const SHIFT_MODEL_NAME      = 'shift';
    const SHIFT_START_TIME      = 'shift_start_time';
    const SHIFT_END_TIME        = 'shift_end_time';
}