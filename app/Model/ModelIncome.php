<?php
/**
 * @package App\Model
 * @since 2/19/2016 - 10:20 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class ModelIncome extends Model
{

    protected $table = 'trx_income';

    public $timestamps = false;

    protected $fillable = array(
        ApplicationConstant::CODE,
        ApplicationConstant::NAME,
        ApplicationConstant::AMOUNT,
        ApplicationConstant::BANK_INCOME,
        ApplicationConstant::DESCRIPTION
    );

}