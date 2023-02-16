<?php

namespace App\Application\Service\Store;

use App\Domain\Entity\Store;
use App\Domain\Entity\StoreManager;

class CreateStoreHandler
{

    public function create(
        string $name,
        string $address,
        float $latitude,
        float $longitude,
        StoreManager $storeManager
    ): Store {
        return (new Store())
            ->setName($name)
            ->setAddress($address)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setStoreManager($storeManager);
    }
}