<?php

namespace App\Application\Command\StoreManager;

use App\Application\Command\StoreManager\Request\CreateStoreManager;
use App\Application\Service\StoreManager\CreateStoreManagerFactory;
use App\Domain\Entity\StoreManager;
use App\Domain\Repository\StoreManagerRepositoryInterface;

class CreateStoreManagerCommandHandler
{

    public function __construct(
        private CreateStoreManagerFactory $createStoreManagerFactory,
        private StoreManagerRepositoryInterface $storeManagerRepository
    ) {
    }

    public function handle(CreateStoreManager $createStoreManager): StoreManager
    {
        $storeManager = $this->createStoreManagerFactory->create($createStoreManager->getName());
        $this->storeManagerRepository->save($storeManager);

        return $storeManager;
    }
}
