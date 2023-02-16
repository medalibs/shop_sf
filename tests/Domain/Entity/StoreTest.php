<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;
use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase
{
    public function testGetters()
    {
        $store = new Store();
        $storeManager = new StoreManager();
        $store->setName($storeName = 'user 1');
        $store->setAddress($storeAddress = 'Street 01 test,AB');
        $store->setLatitude($storeLat = 33.55);
        $store->setLongitude($storeLong = 66.54);
        $store->setStoreManager($storeManager);

        self::assertEquals($storeName, $store->getName());
        self::assertEquals($storeAddress, $store->getAddress());
        self::assertEquals($storeLat, $store->getLatitude());
        self::assertEquals($storeLong, $store->getLongitude());
        self::assertNull($store->getId());
        self::assertInstanceOf(StoreManager::class, $store->getStoreManager());
    }
}