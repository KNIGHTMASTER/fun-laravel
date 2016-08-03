<?php
/**
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:06 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface SavingModelConstant extends BaseModelConstant
{
    const SAVING_ENTITY_NAME  	= 'Saving';
    const SAVING_MODEL_NAME   	= 'saving';
    const SAVING_INDEX_PAGE   	= 'pages.balance.saving.index';
    const SAVING_SHOW_PAGE    	= 'pages.balance.saving.show';
    const SAVING_CREATE_PAGE  	= 'pages.balance.saving.create';
    const SAVING_EDIT_PAGE    	= 'pages.balance.saving.edit';
    const BANK_SAVING 			= 'bank_saving';
    const TRX_TYPE				= 'trx_type';
    const TRANSACTION_TYPE      = 'Transaction Type';
    const EXPENSE_ID			= 'trx_expense_id';
    const INCOME_ID				= 'trx_income_id';
}