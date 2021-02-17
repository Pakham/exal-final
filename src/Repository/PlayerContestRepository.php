<?php

namespace App\Repository;

use App\Entity\PlayerContest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerContest|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerContest|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerContest[]    findAll()
 * @method PlayerContest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerContestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerContest::class);
    }

    // /**
    //  * @return PlayerContest[] Returns an array of PlayerContest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerContest
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
