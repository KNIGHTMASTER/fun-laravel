<?php
/**
 * @package App\Dto\Entity
 * @since 1/08/2016 - 11:00 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\Dto\Entity;


class DTOGroupAppParameter
{

    private $groupParamCode;
    private $appParamCode;

    /**
     * @return mixed
     */
    public function getGroupParamCode()
    {
        return $this->groupParamCode;
    }

    /**
     * @param mixed $groupParamCode
     */
    public function setGroupParamCode($groupParamCode)
    {
        $this->groupParamCode = $groupParamCode;
    }

    /**
     * @return mixed
     */
    public function getAppParamCode()
    {
        return $this->appParamCode;
    }

    /**
     * @param mixed $appParamCode
     */
    public function setAppParamCode($appParamCode)
    {
        $this->appParamCode = $appParamCode;
    }

}