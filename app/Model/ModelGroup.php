<?php
/**
 * @package App\Model
 * @since 4/19/2016 - 5:45 PM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;

class ModelGroup extends Model
{
    protected $table = 'security_group';

    public $timestamps = false;

    protected $fillable = array(
        ApplicationConstant::CODE,
        ApplicationConstant::NAME,
        ApplicationConstant::DESCRIPTION
    );
}