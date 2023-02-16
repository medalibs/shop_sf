<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\StoreManagerRepositoryInterface;
use App\Domain\Entity\StoreManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StoreManager>
 *
 * @method StoreManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreManager[]    findAll()
 * @method StoreManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreManagerRepository extends ServiceEntityRepository implements StoreManagerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreManager::class);
    }

    public function save(StoreManager $storeManager, bool $flush = true): void
    {
        $this->getEntityManager()->persist($storeManager);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findStoreManagerById(int $id):StoreManager|null
    {
        return $this->find($id);
    }
}
