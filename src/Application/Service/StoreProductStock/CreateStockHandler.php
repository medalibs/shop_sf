<?php

namespace App\Application\Service\StoreProductStock;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;
use App\Domain\Entity\StoreProductStock;

class CreateStockHandler
{
    public function create(Store $store, Product $product, int $quantity): StoreProductStock
    {
        return (new StoreProductStock())
            ->setStore($store)
            ->setProduct($product)
            ->setQuantity($quantity);
    }
}