<?php
/**
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:05 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface SecurityBranchModelConstant extends BaseModelConstant
{
    const BRANCH_ENTITY_NAME  = 'Branch';
    const BRANCH_MODEL_NAME   = 'branch';
    const BRANCH_INDEX_PAGE   = 'pages.master.branch.index';
    const BRANCH_SHOW_PAGE    = 'pages.master.branch.show';
    const BRANCH_CREATE_PAGE  = 'pages.master.branch.create';
    const BRANCH_EDIT_PAGE    = 'pages.master.branch.edit';
}
