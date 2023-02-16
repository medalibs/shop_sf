<?php

namespace App\Domain\Repository;

use App\Domain\Entity\StoreManager;

interface StoreManagerRepositoryInterface
{
    public function save(StoreManager $storeManager,bool $flush = false): void;
    public function findStoreManagerById(int $id):StoreManager|null;
}