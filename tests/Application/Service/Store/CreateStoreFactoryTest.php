<?php

namespace App\Tests\Application\Service\Store;

use App\Application\Service\Store\CreateStoreFactory;
use App\Application\Service\Store\CreateStoreHandler;
use App\Domain\Entity\StoreManager;
use PHPUnit\Framework\TestCase;

class CreateStoreFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $createStoreFactory = new CreateStoreFactory(new CreateStoreHandler());
        $store = $createStoreFactory->create(
            $name = 'Store 1',
            $address = 'Street test 01',
            $lat = 3.55,
            $long = 5.22,
            new StoreManager());

        self::assertEquals($name, $store->getName());
        self::assertEquals($address, $store->getAddress());
        self::assertEquals($lat, $store->getLatitude());
        self::assertEquals($long, $store->getLongitude());
        self::assertInstanceOf(StoreManager::class, $store->getStoreManager());
        self::assertNull($store->getId());
    }
}