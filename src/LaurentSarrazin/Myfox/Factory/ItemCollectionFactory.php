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

    public static function createFromJson($json, $type, $myfox_client, $site_id)
    {
        $response = json_decode($json);

        $collection = self::create($type, $myfox_client);
        $items = [];

        if (isset ($response->payload) && isset ($response->payload->items)) {
            foreach ($response->payload->items as $item) {
                $items[] = ItemFactory::create($type, $myfox_client, $item, $site_id);
            }
        }

        $collection->setItems($items);

        return $collection;
    }
} 