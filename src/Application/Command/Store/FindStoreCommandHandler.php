<?php

namespace App\Application\Command\Store;

use App\Application\Command\Store\Request\FindStore;
use App\Domain\Repository\StoreRepositoryInterface;

class FindStoreCommandHandler
{
    public function __construct(
        private readonly StoreRepositoryInterface $storeRepository
    ) {
    }

    public function handle(FindStore $findStore):array
    {
        return $this->storeRepository->search(
            $findStore->getName(),
            $findStore->getLatitude(),
            $findStore->getLongitude(),
            $findStore->getDistance(),
            $findStore->getPage(),
            $findStore->getLimit()
        );
    }
}
