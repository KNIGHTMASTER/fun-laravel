<?php
/**
 * @package App\Http\Controllers
 * @since 1/12/2016 - 11:05 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace app\ConstantValue;


interface SecurityUserModelConstant extends MerchandiseModelConstant
{
    const SECURITY_USER_MODEL_NAME          = 'security_user';
    const PASSWORD                          = 'password';
    const USER_EXPIRED_DATE                 = 'user_expired_date';
    const USER_LOGIN_STATUS                 = 'user_login_status';
    const USER_FAILED_LOGIN                 = 'user_failed_login';
    const USER_FIRST_LOGIN                  = 'user_first_login';
    const USER_LAST_LOGIN                   = 'user_last_login';
    const USER_ENTITY_NAME                  = 'User';
    const USER_INDEX_PAGE                   = 'pages.master.user.index';
    const USER_SHOW_PAGE                    = 'pages.master.user.show';
    const USER_CREATE_PAGE                  = 'pages.master.user.create';
    const USER_EDIT_PAGE                    = 'pages.master.user.edit';
}