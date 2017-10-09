<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TransIp\Client;

class ClientTest extends TestCase
{
    public function testClientConstruct()
    {
//        $client = new Client('', '');

        $client->service('vps')->getVpses();
    }
}