<?php

namespace App\Application\Command\Store;

use App\Application\Command\Store\Request\CreateStore;
use App\Application\Service\Store\CreateStoreFactory;
use App\Domain\Entity\Store;
use App\Domain\Repository\StoreRepositoryInterface;

class CreateStoreCommandHandler
{
    public function __construct(
        private CreateStoreFactory $createStoreFactory,
        private StoreRepositoryInterface $storeRepository
    ) {
    }

    public function handle(CreateStore $createStore): Store
    {
        $store = $this->createStoreFactory->create(
            $createStore->getName(),
            $createStore->getAddress(),
            $createStore->getLatitude(),
            $createStore->getLongitude(),
            $createStore->getStoreManager()
        );
        $this->storeRepository->save($store);

        return $store;
    }
}
