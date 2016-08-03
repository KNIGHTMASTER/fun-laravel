<?php
/**
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:05 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface ShiftModelConstant extends MerchandiseModelConstant
{
    const SHIFT_MODEL_NAME      = 'shift';
    const SHIFT_START_TIME      = 'shift_start_time';
    const SHIFT_END_TIME        = 'shift_end_time';
}