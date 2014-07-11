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
        $path = 'site/' . $this->siteId . '/device/' . $this->deviceId . '/shutter/close';

        return $this->myfoxClient->executeRequest($path, 'post');
    }
} 