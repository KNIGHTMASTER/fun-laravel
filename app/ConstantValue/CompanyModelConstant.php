<?php
/**
 * @package app\Http\Controllers
 * @since 4/26/2016 - 11:35 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface CompanyModelConstant extends BaseModelConstant
{
    const COMPANY_ENTITY_NAME  = 'Company';
    const COMPANY_MODEL_NAME   = 'company';
    const COMPANY_INDEX_PAGE   = 'pages.master.company.index';
    const COMPANY_SHOW_PAGE    = 'pages.master.company.show';
    const COMPANY_CREATE_PAGE  = 'pages.master.company.create';
    const COMPANY_EDIT_PAGE    = 'pages.master.company.edit';
}