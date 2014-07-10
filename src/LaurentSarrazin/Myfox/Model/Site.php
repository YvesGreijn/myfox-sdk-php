<?php

namespace LaurentSarrazin\Myfox\Model;

class Site extends AbstractItem
{
    protected $siteId;
    protected $label;
    protected $brand;
    protected $timezone;
    protected $AXA;

    public function closeAllShutters()
    {
        $shutters = $this->client->getShutterItems($this->siteId);

        foreach ($shutters as $shutter)
        {
            $shutter->close();
        }
    }

    public function getCameraItems()
    {
        return $this->myfoxClient->getItems('camera', "site/" . $this->siteId . "/device/camera");
    }

    public function getShutterItems()
    {
        return $this->myfoxClient->getItems('shutter', "site/" . $this->siteId . "/device/shutter");
    }

    /**
     * @param mixed $AXA
     */
    public function setAXA($AXA)
    {
        $this->AXA = $AXA;
    }

    /**
     * @return mixed
     */
    public function getAXA()
    {
        return $this->AXA;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
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

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
} 