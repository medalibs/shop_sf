<?php

namespace App\Tests\UI\Rest\Controller\Store;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchStoreActionTestPhpTest extends WebTestCase
{
    public function testSomething(): void
    {

        $client = static::createClient();

        $crawler = $client->request('GET', 'http://web/api/stores');

        $this->assertResponseIsSuccessful();
    }
}
