<?php

namespace App\Application\Service\StoreManager;

use App\Domain\Entity\StoreManager;

class CreateStoreManagerHandler
{
    public function create(string $name): StoreManager
    {
        return (new StoreManager())->setName($name);
    }
}
