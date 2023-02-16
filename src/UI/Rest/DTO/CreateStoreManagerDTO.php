<?php

namespace App\UI\Rest\DTO;

use App\Domain\Entity\StoreManager;

class CreateStoreManagerDTO
{
    public function __construct(
        public int    $id,
        public string $name
    )
    {
    }
    public static function fromStoreManager(StoreManager $storeManager): self
    {
        return new self(
            $storeManager->getId(),
            $storeManager->getName()
        );
    }
}