<?php

namespace App\UI\Rest\DTO;

use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;

class CreateStoreDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $address,
        public float $latitude,
        public float $longitude,
        public StoreManager $storeManager,
    ) {
    }

    public static function fromStore(Store $store): self
    {
        return new self(
            $store->getId(),
            $store->getName(),
            $store->getAddress(),
            $store->getLatitude(),
            $store->getLongitude(),
            $store->getStoreManager()
        );
    }
}