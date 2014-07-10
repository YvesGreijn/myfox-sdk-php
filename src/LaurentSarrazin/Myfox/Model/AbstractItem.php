<?php

namespace LaurentSarrazin\Myfox\Model;

use LaurentSarrazin\Myfox\Myfox;

class AbstractItem
{
    protected $myfoxClient;

    public function __construct($myfox_client)
    {
        $this->myfoxClient = $myfox_client;
    }

} 