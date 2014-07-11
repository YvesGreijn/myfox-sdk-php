<?php
namespace LaurentSarrazin\Myfox;

use Buzz\Browser;
use LaurentSarrazin\Myfox\Factory\ItemCollectionFactory;
use LaurentSarrazin\Myfox\Factory\ItemFactory;

class Myfox
{
    protected $token;
    protected $httpClient;

    protected $siteItems;
    protected $cameraItems;
    protected $gateItems;
    protected $heaterItems;
    protected $shutterItems;
    protected $socketItems;
    protected $dataStateItems;
    protected $dataTemperatureItems;
    protected $groupElectric;
    protected $groupShutter;

    const API_BASE_URL = 'https://api.myfox.me:443/v2';

    public function __construct($token, $httpClient = null)
    {
        $this->token = $token;
        if (null === $httpClient) {
            $httpClient = new Browser();
        }
        $this->httpClient = $httpClient;
    }

    public function getSites()
    {
        $client = ItemFactory::create('client', $this);

        return $client->getSiteItems();
    }

    public function getSite($label)
    {
        $sites = $this->getSites();
        foreach ($sites as $site) {
            if (strtolower($label) == strtolower($site->getLabel())) {

                return $site;
            }
        }

        return null;
    }

    public function getItems($type, $path, $site_id = null)
    {
        $property = $type . 'Items';

        if (null === $this->$property) {
            $this->$property = $this->executeRequest('/' . $path . '/items');
        }

        $json = $this->$property->getContent();

        $collection = ItemCollectionFactory::createFromJson($json, $type, $this, $site_id);

        return $collection;
    }

    public function executeRequest($path, $method = 'get', $params = array())
    {
        $params['access_token'] = $this->token;

        return $this->httpClient->$method(
            self::API_BASE_URL . $path . '?' . http_build_query($params)
        );
    }
}