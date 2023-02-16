<?php

namespace App\Tests\Application\Service\Store;

use App\Application\Service\Store\CreateStoreHandler;
use App\Domain\Entity\StoreManager;
use PHPUnit\Framework\TestCase;

class CreateStoreHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $createStoreHandler = new CreateStoreHandler();
        $store = $createStoreHandler->create(
            $name = 'Store 1',
            $address = 'Street test 01',
            $lat = 3.55,
            $long = 5.22,
            new StoreManager()
        );

        self::assertEquals($name, $store->getName());
        self::assertEquals($address, $store->getAddress());
        self::assertEquals($lat, $store->getLatitude());
        self::assertEquals($long, $store->getLongitude());
        self::assertInstanceOf(StoreManager::class, $store->getStoreManager());
    }
}