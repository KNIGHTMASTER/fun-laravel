<?php

/**
 * @package App\Http\Controllers\Lov
 * @since 6/1/2016 - 5:41 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Http\Controllers\Lov;

use App\ConstantValue\ApplicationConstant;
use App\Model\ModelSavingHistory;

class SavingHistoryLOV extends ABaseLOV
{
    public function populateData()
    {
        $data = ModelSavingHistory::all(
            [ApplicationConstant::NAME, ApplicationConstant::ID]
        );
        return $data;
    }

}