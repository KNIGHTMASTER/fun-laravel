<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/12/2016
 * Time: 11:06 AM
 */

namespace App\ConstantValue;


interface ExpenseModelKey extends BaseModelKey
{
    const EXPENSE_ENTITY_NAME  = 'Expense';
    const EXPENSE_MODEL_NAME   = 'expense';    
    const EXPENSE_SOURCE 		='expense_source';
    const BANK_EXPENSE_DEST	   = 'bank_expense_dest';
    const EXPENSE_INDEX_PAGE   = 'pages.balance.expense.index';
    const EXPENSE_SHOW_PAGE    = 'pages.balance.expense.show';
    const EXPENSE_CREATE_PAGE  = 'pages.balance.expense.create';
    const EXPENSE_EDIT_PAGE    = 'pages.balance.expense.edit';
}