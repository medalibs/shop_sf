<?php

namespace App\Application\Command\Stock;

use App\Application\Command\Stock\Request\CreateStock;
use App\Application\Service\StoreProductStock\CreateStockFactory;
use App\Domain\Entity\StoreProductStock;
use App\Domain\Repository\StoreProductStockRepositoryInterface;

class CreateStockCommandHandler
{
    public function __construct(
        private readonly CreateStockFactory $createStockFactory,
        private readonly StoreProductStockRepositoryInterface $storeProductStockRepository
    ) {
    }

    public function handle(CreateStock $createStock): StoreProductStock
    {
        $stock = $this->createStockFactory->create(
            $createStock->getStore(),
            $createStock->getProduct(),
            $createStock->getQuantity()
        );
        $this->storeProductStockRepository->save($stock);

        return $stock;
    }
}
