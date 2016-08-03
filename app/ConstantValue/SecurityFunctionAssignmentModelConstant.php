<?php
/**
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:05 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface SecurityFunctionAssignmentModelConstant extends MerchandiseModelConstant
{
    const SECURITY_FUNCTION_ASSIGNMENT_MODEL_NAME   = 'security_function_assignment';
    const FUNCTION_ID                               = 'function_id';
    const GROUP_ID                                  = 'group_id';
    const FUNCTION_ASSIGNMENT_ORDER                 = 'function_assignment_order';
    const ACTION_TYPE                               = 'action_type';
}