<?php
/**
 * @package app\ConstantValue
 * @since 4/19/2016 - 10:23 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\ConstantValue;


interface ViewConstant
{

    const PAGE_TITLE_MASTER_DATA    = "Master Data";
    const SIMPLE_HEADER_ID          = "Id";
    const SIMPLE_HEADER_CODE        = "Code";
    const SIMPLE_HEADER_NAME        = "Name";
    const SIMPLE_HEADER_DESCRIPTION = "Description";

    /*USER*/
    const TABLE_COLUMN_EXPIRED_DATE = "Expired Date";
    const TABLE_COLUMN_LOGIN_STATUS = "Login Status";

    /*EXPENSE*/
    const TABLE_COLUMN_AMOUNT       = 'Amount';
    const TABLE_COLUMN_TIMESTAMP    = 'Timestamp';
    const TABLE_COLUMN_BANK_EXPENSE = 'Bank Expense';

    /*DATE*/
    const GENERIC_DATE_FORMAT       = 'Y-m-d';
    const TIMESTAMP_DATE_FORMAT     = 'Y-m-d H:i:s';
    const FORMAT_DATE_DD_MM_YYYY    = 'd/m/Y';

    /*MENU*/
    const STYLE                     = 'style';
    const SUB_MENU                  = 'sub_menu';
}