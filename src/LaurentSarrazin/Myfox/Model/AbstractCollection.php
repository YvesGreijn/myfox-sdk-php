<?php

namespace LaurentSarrazin\Myfox\Model;


class AbstractCollection
{
    protected $items;

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