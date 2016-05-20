<?php
/**
 * @package App\Dto\Response
 * @since 1/25/2016 - 11:13 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace App\Dto\Response;


class LoginResponseDto extends BaseResponseDto
{

    public $userCode;

    public $groupId;

    public $item;

    /**
     * @return mixed
     */
    public function getUserCode()
    {
        return $this->userCode;
    }

    /**
     * @param mixed $userCode
     */
    public function setUserCode($userCode)
    {
        $this->userCode = $userCode;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param mixed $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return MenuResponseDto
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param MenuResponseDto $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

}