<?php

namespace App\Repository;

use App\Entity\DepartureZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DepartureZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartureZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartureZone[]    findAll()
 * @method DepartureZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartureZoneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DepartureZone::class);
    }

//    /**
//     * @return DepartureZone[] Returns an array of DepartureZone objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartureZone
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
