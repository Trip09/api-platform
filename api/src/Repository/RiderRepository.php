<?php

namespace App\Repository;

use App\Entity\Rider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rider[]    findAll()
 * @method Rider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RiderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rider::class);
    }

    // /**
    //  * @return Rider[] Returns an array of Rider objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rider
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
