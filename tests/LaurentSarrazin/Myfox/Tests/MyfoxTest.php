<?php

namespace LaurentSarrazin\Myfox\Tests;

use LaurentSarrazin\Myfox\Myfox;

class MyfoxTest extends \PHPUnit_Framework_Testcase
{
    public function test_()
    {
        $myfox_client = new Myfox('token', new HttpClientStub());
        $myfox_client->getSites();
    }
} 