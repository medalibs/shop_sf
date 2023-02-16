<?php

namespace App\Application\Service\StoreProductStock;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;
use App\Domain\Entity\StoreProductStock;

class CreateStockFactory
{
    public function __construct(private readonly CreateStockHandler $createStockHandler)
    {
    }
    public function create(Store $store,Product $product,int $quantity):StoreProductStock
    {
        return $this->createStockHandler->create($store, $product, $quantity);
    }
}