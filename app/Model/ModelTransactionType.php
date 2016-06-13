<?php
/**
 * @package App\Model
 * @since 6/8/2016 - 2:07 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class ModelTransactionType extends Model
{

    protected $table = 'mst_transaction_type';

    public $timestamps = false;

    protected $fillable = array(
        ApplicationConstant::CODE,
        ApplicationConstant::NAME,
        ApplicationConstant::DESCRIPTION
    );

}