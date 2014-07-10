<?php

namespace LaurentSarrazin\Myfox\Factory;

class ItemFactory
{
    public static function create($type, $myfox_client, $item = null)
    {
        $namespace = '\LaurentSarrazin\Myfox\Model\\';
        $class = $namespace . ucfirst($type);

        $object = new $class($myfox_client);

        if (null != $item && is_object($item)) {
            $vars = get_object_vars($item);

            foreach ($vars as $var => $value) {

                $method = 'set' . ucfirst($var);

                $object->$method($value);
            }
        }

        return $object;
    }
} 