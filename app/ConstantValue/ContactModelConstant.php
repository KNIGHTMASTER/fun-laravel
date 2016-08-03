<?php
/**
 * 
 * @package fun-laravel\ConstantValue
 * @since 1/12/2016 - 11:06 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\ConstantValue;


interface ContactModelConstant extends BaseModelConstant
{
    const CONTACT_MODEL_NAME    = 'contact';
    const POSTAL_CODE           = 'postal_code';
    const TELEPHONE_NUMBER_1    = 'telephone_number_1';
    const TELEPHONE_NUMBER_2    = 'telephone_number_2';
    const FAX_NUMBER            = 'fax_number';
    const PERSONAL_NUMBER       = 'personal_number';
    const EMAIL                 = 'email';
}