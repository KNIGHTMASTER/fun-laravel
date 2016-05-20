<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/12/2016
 * Time: 11:06 AM
 */

namespace App\ConstantValue;


interface BankModelKey extends BaseModelKey
{
    const BANK_ENTITY_NAME  = 'Bank';
    const BANK_MODEL_NAME   = 'bank';
    const BANK_INDEX_PAGE   = 'pages.master.bank.index';
    const BANK_SHOW_PAGE    = 'pages.master.bank.show';
    const BANK_CREATE_PAGE  = 'pages.master.bank.create';
    const BANK_EDIT_PAGE    = 'pages.master.bank.edit';
}