<?php
/**
 * @package app\Http\Controllers
 * @since 4/26/2016 - 11:06 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface GroupModelKey extends BaseModelKey
{
    const GROUP_ENTITY_NAME  = 'Group';
    const GROUP_MODEL_NAME   = 'group';
    const GROUP_INDEX_PAGE   = 'pages.master.group.index';
    const GROUP_SHOW_PAGE    = 'pages.master.group.show';
    const GROUP_CREATE_PAGE  = 'pages.master.group.create';
    const GROUP_EDIT_PAGE    = 'pages.master.group.edit';
}