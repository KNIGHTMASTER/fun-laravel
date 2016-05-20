<?php
/**
 * @package App\Dto\Entity
 * @since 12/31/2015 - 11:00 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Dto\Entity;

class DtoEmployeeEntity
{

    public $id;

    public $employeeFirstName;

    public $employeeLastName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmployeeFirstName()
    {
        return $this->employeeFirstName;
    }

    /**
     * @param mixed $employeeFirstName
     */
    public function setEmployeeFirstName($employeeFirstName)
    {
        $this->employeeFirstName = $employeeFirstName;
    }

    /**
     * @return mixed
     */
    public function getEmployeeLastName()
    {
        return $this->employeeLastName;
    }

    /**
     * @param mixed $employeeLastName
     */
    public function setEmployeeLastName($employeeLastName)
    {
        $this->employeeLastName = $employeeLastName;
    }


}
