<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;
use App\Domain\Entity\StoreProductStock;
use PHPUnit\Framework\TestCase;

class StoreProductStockTest extends TestCase
{
    public function testGetters()
    {
        $stock = new StoreProductStock();
        $stock->setStore(new Store());
        $stock->setProduct(new Product());
        $stock->setQuantity($qty = 10);

        self::assertEquals($qty, $stock->getQuantity());
        self::assertNull($stock->getId());
        self::assertInstanceOf(Store::class, $stock->getStore());
        self::assertInstanceOf(Product::class, $stock->getProduct());
    }
}