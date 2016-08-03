<?php
/**
 * @package fun-laravel\Http\Controllers\BaseReport
 * @since 1/12/2016 - 9:09 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface JSONConstant
{
    const ITEM_NUMBER       = 'item_number';
    const FILTER_KEY        = 'filter_key';
    const FILTER_VALUE      = 'filter_value';
    const SORTING_KEY       = 'sorting_key';
    const SORTING_DIRECTION = 'sorting_direction';
    const ASCENDING         = 'ascending';
    const DESCENDING        = 'descending';
    const GROUP_PARAM_CODE  = 'group_param_code';
    const APP_PARAM_CODE    = 'app_param_code';
    const USER_CODE         = 'user_code';
    const ITEM              = 'item';
    const LINK              = 'link';
    const ORDER             = 'order';
    const LEVEL             = 'level';
    const PARENT            = 'parent';
    const PARENT_ITEM       = 'parent_item';
}