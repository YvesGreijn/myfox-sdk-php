<?php

namespace LaurentSarrazin\Myfox\Model;


class AbstractCollection extends \ArrayObject
{
    protected $items;

    public function getIterator() {
        return new \ArrayIterator($this->items);
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }
} 