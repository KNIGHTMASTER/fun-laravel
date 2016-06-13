<?php
/**
 * @package App\ConstantValue
 * @since 13/6/2016 - 11:10 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface SavingHistoryModelKey extends BaseModelKey
{
    const SAVING_HISTORY_ENTITY_NAME  	= 'Saving History';
    const SAVING_HISTORY_MODEL_NAME   	= 'saving-history';
    const SAVING_HISTORY_INDEX_PAGE   	= 'pages.balance.saving-history.index';
    const SAVING_HISTORY_SHOW_PAGE    	= 'pages.balance.saving-history.show';
    const SAVING_HISTORY_CREATE_PAGE  	= 'pages.balance.saving-history.create';
    const SAVING_HISTORY_EDIT_PAGE    	= 'pages.balance.saving-history.edit';
    const SAVING_ID 			        = 'saving_id';    
}