<?php
/**
 * @package App\Model
 * @since 4/26/2016 - 11:31 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class ModelFunctionAssignment extends Model
{

    protected $table = 'security_function_assignment';

    public $timestamps = false;

    protected $fillable = array(
        ApplicationConstant::CODE,
        ApplicationConstant::NAME,
        ApplicationConstant::DESCRIPTION
    );

}