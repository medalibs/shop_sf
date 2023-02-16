<?php

namespace App\Domain\Repository;

use App\Domain\Entity\StoreProductStock;

interface StoreProductStockRepositoryInterface
{
    public function save(StoreProductStock $store): void;
}
