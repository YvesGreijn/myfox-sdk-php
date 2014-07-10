<?php

namespace LaurentSarrazin\Myfox\Model;


class Shutter extends AbstractItem
{
    protected $deviceId;
    protected $label;
    protected $modelId;
    protected $modelLabel;

    public function close()
    {
        $site_id = $this->client->getSiteId();

        $path = 'site/' . $site_id . '/device/' . $this->deviceId . '/shutter/close';

        return $this->client->executeRequest($path, 'post');
    }
} 