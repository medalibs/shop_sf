<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\StoreRepositoryInterface;
use App\Domain\Entity\Store;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Infrastructure\Common\Pagination\Paginator;

class StoreRepository extends ServiceEntityRepository implements StoreRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private readonly Paginator $paginator)
    {
        parent::__construct($registry, Store::class);
    }

    public function save(Store $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function search(string $name, float $latitude, float $longitude, int $distance, int $page, int $limit):array
    {
        $query = $this->createQueryBuilder(
            'store'
        )->addSelect('Geolocation(store.latitude = :latitude, store.longitude = :longitude) as HIDDEN dist');
         $query
             ->andWhere(' store.name like :storeName')
             ->setParameter('storeName', "%$name%");
        $query
            ->andWhere('Geolocation(store.latitude = :latitude, store.longitude = :longitude) <= :maxDistance')
            ->setParameter('maxDistance', $distance);
        $query
            ->setParameter('latitude', $latitude)
            ->setParameter('longitude', $longitude)
            ->orderBy('dist');

        $paginator = $this->paginator->paginate($query->getQuery(), $page, $limit);

        return $paginator->getResult();

    }

    public function find($id, $lockMode = null, $lockVersion = null):Store
    {
        return parent::find($id, $lockMode, $lockVersion);
    }
}
