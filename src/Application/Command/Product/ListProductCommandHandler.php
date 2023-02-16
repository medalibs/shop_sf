<?php

namespace App\Application\Command\Product;

use App\Application\Command\Product\Request\FindProduct;
use App\Domain\Repository\ProductRepositoryInterface;

class ListProductCommandHandler
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    ) {
    }

    public function handle(FindProduct $findProduct):array
    {
        return $this->productRepository->list(
            $findProduct->getPage(),
            $findProduct->getLimit()
        );
    }
}