<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/12/2016
 * Time: 11:05 AM
 */

namespace app\ConstantValue;


interface SecurityBranchModelKey extends BaseModelKey
{
    const BRANCH_ENTITY_NAME  = 'Branch';
    const BRANCH_MODEL_NAME   = 'branch';
    const BRANCH_INDEX_PAGE   = 'pages.master.branch.index';
    const BRANCH_SHOW_PAGE    = 'pages.master.branch.show';
    const BRANCH_CREATE_PAGE  = 'pages.master.branch.create';
    const BRANCH_EDIT_PAGE    = 'pages.master.branch.edit';
}
