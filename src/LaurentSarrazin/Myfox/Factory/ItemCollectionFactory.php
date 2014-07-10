<?php

namespace LaurentSarrazin\Myfox\Factory;

class ItemCollectionFactory
{
    public static function create($type, $myfox_client)
    {
        $namespace = '\LaurentSarrazin\Myfox\Model\\';
        $class = $namespace . ucfirst($type) . 'Collection';

        return new $class($myfox_client);
    }

    public static function createFromJson($json, $type, $myfox_client)
    {
        $response = json_decode($json);

        $collection = self::create($type, $myfox_client);
        $items = new \SplFixedArray();

        if (isset ($response->payload) && isset ($response->payload->items)) {
            $items->setSize(count($response->payload->items));
            $i = 0;
            foreach ($response->payload->items as $item) {
                $items[$i] = ItemFactory::create($type, $myfox_client, $item);
                $i++;
            }
        }

        $collection->setItems($items);

        return $collection;
    }
} 