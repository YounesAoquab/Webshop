<?php

namespace App\Repository;

use App\Entity\Productcode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Productcode|null find($id, $lockMode = null, $lockVersion = null)
 * @method Productcode|null findOneBy(array $criteria, array $orderBy = null)
 * @method Productcode[]    findAll()
 * @method Productcode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductcodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Productcode::class);
    }

    // /**
    //  * @return Productcode[] Returns an array of Productcode objects
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
    public function findOneBySomeField($value): ?Productcode
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
