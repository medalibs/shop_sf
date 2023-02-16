<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Store;

interface StoreRepositoryInterface
{
    public function save(Store $store): void;
    public function search
    (
        string $name,
        float $latitude,
        float $longitude,
        int $distance,
        int $page,
        int $limit
    ):array;
    public function find(int $id,int|null $lockMode, int|null $lockVersion): Store;
}
