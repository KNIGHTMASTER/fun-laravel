<?php
/**
 * @package App\ConstantValue
 * @since 12/1/2016 - 11:16 AM
 * @author <a href ="mailto:fauzi.knightbalance.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface IncomeModelConstant extends BaseModelConstant
{
    const INCOME_ENTITY_NAME  = 'Income';
    const INCOME_MODEL_NAME   = 'income';
    const BANK_INCOME		  = 'bank_income';
    const INCOME_INDEX_PAGE   = 'pages.balance.income.index';
    const INCOME_SHOW_PAGE    = 'pages.balance.income.show';
    const INCOME_CREATE_PAGE  = 'pages.balance.income.create';
    const INCOME_EDIT_PAGE    = 'pages.balance.income.edit';
}