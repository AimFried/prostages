<?php

namespace App\Repository;

use App\Entity\FORMATION;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FORMATION|null find($id, $lockMode = null, $lockVersion = null)
 * @method FORMATION|null findOneBy(array $criteria, array $orderBy = null)
 * @method FORMATION[]    findAll()
 * @method FORMATION[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FORMATIONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FORMATION::class);
    }

    // /**
    //  * @return FORMATION[] Returns an array of FORMATION objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FORMATION
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
