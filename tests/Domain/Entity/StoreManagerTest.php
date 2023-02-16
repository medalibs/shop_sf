<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;
use PHPUnit\Framework\TestCase;

class StoreManagerTest extends TestCase
{
    public function testGetters()
    {
        $storeManager = new StoreManager();
        $storeManager->setName($name = 'Manager 1');

        self::assertEquals($name, $storeManager->getName());
        self::assertNull($storeManager->getId());
    }
}