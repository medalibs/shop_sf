<?php

namespace App\Application\Command\Product;

use App\Application\Command\Product\Request\CreateProduct;
use App\Application\Service\Product\CreateProductFactory;
use App\Domain\Entity\Product;
use App\Domain\Repository\ProductRepositoryInterface;

class CreateProductCommandHandler
{
    public function __construct(
        private readonly CreateProductFactory $createProductFactory,
        private readonly ProductRepositoryInterface $productRepository
    ) {
    }

    public function handle(CreateProduct $createProduct): Product
    {
        $product = $this->createProductFactory->create(
            $createProduct->getName(),
            $createProduct->getImage()
        );
        $this->productRepository->save($product);

        return $product;
    }
}
