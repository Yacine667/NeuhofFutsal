<?php

namespace App\Repository;

use App\Entity\RemplaceEntrant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RemplaceEntrant>
 *
 * @method RemplaceEntrant|null find($id, $lockMode = null, $lockVersion = null)
 * @method RemplaceEntrant|null findOneBy(array $criteria, array $orderBy = null)
 * @method RemplaceEntrant[]    findAll()
 * @method RemplaceEntrant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemplaceEntrantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RemplaceEntrant::class);
    }

    public function save(RemplaceEntrant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RemplaceEntrant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RemplaceEntrant[] Returns an array of RemplaceEntrant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RemplaceEntrant
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
