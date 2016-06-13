<?php
/**
 * @package App\Model
 * @since 4/19/2016 - 10:20 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Model;


use App\ConstantValue\ApplicationConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ModelUser extends Authenticatable
{
    protected $table = 'security_user';

    public $timestamps = false;

    protected $fillable = array(
        ApplicationConstant::USER_CODE,
        ApplicationConstant::NAME,
        ApplicationConstant::PASSWORD,
        ApplicationConstant::GROUP_ID,
        ApplicationConstant::USER_EXPIRED_DATE,
        ApplicationConstant::DESCRIPTION
    );

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}