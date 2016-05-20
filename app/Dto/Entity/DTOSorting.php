<?php
/**
 * @package App\Dto\Entity
 * @since 1/18/2016 - 1:17 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace app\Dto\Entity;


class DTOSorting
{

    private $sortingKey;
    private $sortingDirection;


    /**
     * @return mixed
     */
    public function getSortingKey()
    {
        return $this->sortingKey;
    }

    /**
     * @param mixed $sortingKey
     */
    public function setSortingKey($sortingKey)
    {
        $this->sortingKey = $sortingKey;
    }

    /**
     * @return mixed
     */
    public function getSortingDirection()
    {
        return $this->sortingDirection;
    }

    /**
     * @param mixed $sortingDirection
     */
    public function setSortingDirection($sortingDirection)
    {
        $this->sortingDirection = $sortingDirection;
    }
}