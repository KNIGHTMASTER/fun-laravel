<?php
/**
 * @package App\Model
 * @since 1/06/2016 - 02:17 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class ModelExpense extends Model
{

    protected $table = 'trx_expense';

    public $timestamps = false;

    protected $fillable = array(        
        ApplicationConstant::NAME,
        ApplicationConstant::CODE,
        ApplicationConstant::DESCRIPTION,
        ApplicationConstant::AMOUNT,
        ApplicationConstant::TIMESTAMP,
        ApplicationConstant::EXPENSE_SOURCE,
        ApplicationConstant::BANK_EXPENSE_DEST
    );

}