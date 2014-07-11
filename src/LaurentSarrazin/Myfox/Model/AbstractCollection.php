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

    public function getItemName()
    {
        return static::ITEM_NAME;
    }

    public function __call($name, $args)
    {
        $class = __NAMESPACE__ . '\\' . ucfirst($this->getItemName());

        if (method_exists($class, $name)) {
            $result = [];
            foreach ($this->getItems() as $item) {
                $result[] = call_user_func_array([$item, $name], $args);
            }

            return $result;
        }
    }
}