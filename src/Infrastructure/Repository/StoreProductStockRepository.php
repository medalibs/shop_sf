<?php

namespace App\Infrastructure\Repository;


use App\Domain\Entity\StoreProductStock;
use App\Domain\Repository\StoreProductStockRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StoreProductStockRepository extends ServiceEntityRepository implements StoreProductStockRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreProductStock::class);
    }

    public function save(StoreProductStock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
