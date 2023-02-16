<?php

namespace App\Application\Service\StoreManager;

use App\Domain\Entity\StoreManager;

class CreateStoreManagerFactory
{
    public function __construct(private readonly CreateStoreManagerHandler $createStoreManagerHandler)
    {
    }

    public function create(string $name): StoreManager
    {
        return $this->createStoreManagerHandler->create($name);
    }
}
