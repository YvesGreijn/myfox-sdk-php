# Unofficial Myfox API PHP Client

See http://www.myfox.fr/ and https://api.myfox.me for more information on myfox and their API.

This client is developed from scratch but the Myfox API has been built with Swagger, which can generate client code in different languages.

Check my other repository to learn more about it : https://github.com/Laurent-Sarrazin/myfox-swagger.

This client is under heavy development : do not use it for anything that matters. Kittens should be killed.

## Why ?

This Client is an attempt to provide an easy way to access the Myfox API.

The idea is to have a high-level interface to control Myfox devices.

For example, being able to close all the shutters in a single line of code :

    $client->getSite('home')->getShutters()->close();

This is the idea. For now, only a few methods have been implemented.

Stay tuned for more or contribute.

## Installation

First, clone the project. Then :

    composer.phar install

## Usage

First, include the autoloader :

    require_once __DIR__ . '/../vendor/autoload.php';

Get a token at https://api.myfox.me

And instantiate a new client :

    $myfox_client = new \LaurentSarrazin\Myfox\Myfox($token);

Now, you can get all the sites :

    $myfox_client->getSites()

Or only one site by its label :

    $home = $myfox_client->getSite('home');

And close all the shutters of this site :

    $shutters = $home->getShutters();

    $shutters->close();

## Limitations

I don't own any myfox device for now. It means that I can't test the API as I'd want and that some parts of the code are based on guesses.
