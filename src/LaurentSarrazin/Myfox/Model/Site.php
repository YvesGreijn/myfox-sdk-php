<?php

namespace LaurentSarrazin\Myfox\Model;

class Site extends AbstractItem
{
    protected $siteId;
    protected $label;
    protected $brand;
    protected $timezone;
    protected $AXA;

    public function getCameras()
    {
        return $this->getDevices('camera');
    }

    public function getShutters()
    {
        return $this->getDevices('shutter');
    }

    protected function getDevices($type)
    {
        return $this->myfoxClient->getItems($type, "site/" . $this->siteId . "/device/$type", $this->siteId);
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