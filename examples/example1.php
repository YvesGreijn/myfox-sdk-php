<?php
require_once __DIR__ . '/../vendor/autoload.php';

$token = '%token%';

$myfox_client = new \LaurentSarrazin\Myfox\Myfox($token);

// get all sites
$sites = $myfox_client->getSites();

// or get a site by its label
$home = $myfox_client->getSite('home');


// get all the shutters for a site
$shutters = $home->getShutters();

// todo : close / open the shutters
//$shutters->close();
