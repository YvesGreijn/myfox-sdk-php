<?php

namespace LaurentSarrazin\Myfox\Model;

class Client extends AbstractItem
{
    public function getSiteItems()
    {
        return $this->myfoxClient->getItems('site', 'client/site');
    }
} 