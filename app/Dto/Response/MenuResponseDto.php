<?php
/**
 * @package App\Dto\Response
 * @since 1/25/2016 - 11:16 AM
 * @author <a href ="mailto:fauzi.knightmaster.achmad@gmail.com">Achmad Fauzi</a>
 */
namespace app\Dto\Response;


class MenuResponseDto
{

    public $code;

    public $name;

    public $link;

    public $order;

    public $level;

    public $parent;

    public $parentItem;

    /**
     * MenuResponseDto constructor.
     */
    public function __construct()
    {
        $this->parentItem = new MenuResponseDto();
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return MenuResponseDto
     */
    public function getParentItem()
    {
        return $this->parentItem;
    }

    /**
     * @param MenuResponseDto $parentItem
     */
    public function setParentItem($parentItem)
    {
        $this->parentItem = $parentItem;
    }

}