<?php

namespace App\Application\Service\Store;

use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;

class CreateStoreFactory
{
    public function __construct(private readonly CreateStoreHandler $createStoreHandler)
    {
    }

    public function create(
        string $name,
        string $address,
        float $latitude,
        float $longitude,
        StoreManager $storeManager
    ): Store {
        return $this->createStoreHandler->create(
            $name,
            $address,
            $latitude,
            $longitude,
            $storeManager
        );
    }
}
