<?php

/**
 * @package App\Http\Controllers\Lov
 * @since 6/8/2016 - 2:06 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Http\Controllers\Lov;

use App\ConstantValue\ApplicationConstant;
use App\Model\ModelTransactionType;

class TrxTypeLOV extends ABaseLOV
{
    public function populateData()
    {
        $data = ModelTransactionType::all(
            [ApplicationConstant::NAME, ApplicationConstant::ID]
        );
        return $data;
    }

}