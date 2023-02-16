<?php

namespace App\Application\Command\Store\Request;

use App\Domain\Entity\StoreManager;

class CreateStore
{
    public function __construct(
        private string $name,
        private string $address,
        private float $latitude,
        private float $longitude,
        private StoreManager $storeManager
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getStoreManager(): StoreManager
    {
        return $this->storeManager;
    }

}