<?php

namespace App\Repository;

use App\Entity\Conegory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conegory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conegory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conegory[]    findAll()
 * @method Conegory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConegoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conegory::class);
    }

    // /**
    //  * @return Conegory[] Returns an array of Conegory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conegory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
