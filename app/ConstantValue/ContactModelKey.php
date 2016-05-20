<?php
/**
 * Created by PhpStorm.
 * User: Ladies Man
 * Date: 1/12/2016
 * Time: 11:06 AM
 */

namespace App\ConstantValue;


interface ContactModelKey extends BaseModelKey
{
    const CONTACT_MODEL_NAME    = 'contact';
    const POSTAL_CODE           = 'postal_code';
    const TELEPHONE_NUMBER_1    = 'telephone_number_1';
    const TELEPHONE_NUMBER_2    = 'telephone_number_2';
    const FAX_NUMBER            = 'fax_number';
    const PERSONAL_NUMBER       = 'personal_number';
    const EMAIL                 = 'email';
}