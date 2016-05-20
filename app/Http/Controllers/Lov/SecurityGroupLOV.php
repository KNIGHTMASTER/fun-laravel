<?php

/**
 * @package App\Http\Controllers\Lov
 * @since 4/19/2016 - 5:39 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Http\Controllers\Lov;

use App\ConstantValue\ApplicationConstant;
use App\Model\ModelGroup;

class SecurityGroupLOV extends ABaseLOV
{
    public function populateData()
    {
        $data = ModelGroup::all(
            [ApplicationConstant::NAME, ApplicationConstant::ID]
        );
        return $data;
    }

}