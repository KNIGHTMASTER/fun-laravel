<?php
/**
 * @package App\Dto\Entity
 * @since 1/12/2016 - 11:15 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */

namespace App\Dto\Entity;


class DTOPaging extends DTOSorting
{
    private $itemNumber;
    private $filterKey;
    private $filterValue;

    /**
     * DTOPaging constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getItemNumber()
    {
        return $this->itemNumber;
    }

    /**
     * @param mixed $itemNumber
     */
    public function setItemNumber($itemNumber)
    {
        $this->itemNumber = $itemNumber;
    }

    /**
     * @return mixed
     */
    public function getFilterKey()
    {
        return $this->filterKey;
    }

    /**
     * @param mixed $filterKey
     */
    public function setFilterKey($filterKey)
    {
        $this->filterKey = $filterKey;
    }

    /**
     * @return mixed
     */
    public function getFilterValue()
    {
        return $this->filterValue;
    }

    /**
     * @param mixed $filterValue
     */
    public function setFilterValue($filterValue)
    {
        $this->filterValue = $filterValue;
    }


}