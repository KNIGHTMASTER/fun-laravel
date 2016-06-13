<?php
/**
 * @package App\ConstantValue
 * @since 12/1/2016 - 11:16 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
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