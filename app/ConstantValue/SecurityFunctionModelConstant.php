<?php
/**
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:05 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface SecurityFunctionModelConstant extends MerchandiseModelConstant
{
    const SECURITY_FUNCTION_MODEL_NAME      = 'security_function';
    const FUNCTION_URL                      = 'function_url';
    const FUNCTION_ORDER                    = 'function_order';
    const FUNCTION_LEVEL                    = 'function_level';
    const FUNCTION_STYLE                    = 'function_style';
    const FUNCTION_PARENT_ID                = 'function_parent_id';
}