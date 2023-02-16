<?php

namespace App\Application\Command\Stock\Request;

use App\Domain\Entity\Product;
use App\Domain\Entity\Store;

class CreateStock
{
    public function __construct(private readonly Store $store, private readonly Product $product,private readonly int $quantity)
    {
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }
    public function getProduct(): ?Product
    {
        return $this->product;
    }
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

}