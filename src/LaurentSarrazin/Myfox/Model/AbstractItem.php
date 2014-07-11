<?php

namespace LaurentSarrazin\Myfox\Model;

use LaurentSarrazin\Myfox\Myfox;

class AbstractItem
{
    protected $myfoxClient;

    protected $siteId;

    public function __construct($myfox_client)
    {
        $this->myfoxClient = $myfox_client;
    }

    /**
     * @param mixed $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }
}