<?php

namespace App\Repository;

use App\Entity\RemplaceSortant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RemplaceSortant>
 *
 * @method RemplaceSortant|null find($id, $lockMode = null, $lockVersion = null)
 * @method RemplaceSortant|null findOneBy(array $criteria, array $orderBy = null)
 * @method RemplaceSortant[]    findAll()
 * @method RemplaceSortant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemplaceSortantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RemplaceSortant::class);
    }

    public function save(RemplaceSortant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RemplaceSortant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RemplaceSortant[] Returns an array of RemplaceSortant objects
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

//    public function findOneBySomeField($value): ?RemplaceSortant
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
