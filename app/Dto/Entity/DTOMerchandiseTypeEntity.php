<?php
/**
 * @package App\Dto\Entity
 * @since 12/31/2015 - 11:00 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Dto\Entity;

class DtoMerchandiseTypeEntity extends BaseDTOEntity
{

    public $merchandiseId;

    /**
     * @return mixed
     */
    public function getMerchandiseId()
    {
        return $this->merchandiseId;
    }

    /**
     * @param mixed $merchandiseId
     */
    public function setMerchandiseId($merchandiseId)
    {
        $this->merchandiseId = $merchandiseId;
    }



}
