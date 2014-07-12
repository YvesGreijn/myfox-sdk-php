<?php
namespace LaurentSarrazin\Myfox;

use Widop\HttpAdapter\CurlHttpAdapter;
use Widop\HttpAdapter\HttpAdapterInterface;
use LaurentSarrazin\Myfox\Factory\ItemCollectionFactory;
use LaurentSarrazin\Myfox\Factory\ItemFactory;

class Myfox
{
    protected $token;
    protected $httpAdapter;

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

    public function __construct($token, HttpAdapterInterface $httpAdapter = null)
    {
        $this->token = $token;
        if (null === $httpAdapter) {
            $httpAdapter = new CurlHttpAdapter();
        }
        $this->httpAdapter = $httpAdapter;
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

        return ItemCollectionFactory::createFromJson($this->$property, $type, $this, $site_id);
    }

    public function executeRequest($path, $method = 'get', $params = array())
    {
        $params['access_token'] = $this->token;

        $method = $method . 'Content';

        return $this->httpAdapter->$method(
            self::API_BASE_URL . $path . '?' . http_build_query($params)
        );
    }
}