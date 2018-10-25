<?php

namespace App\Repository;

use App\Entity\Journey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Journey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Journey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Journey[]    findAll()
 * @method Journey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JourneyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Journey::class);
    }

    /**
     * @param Journey $journey
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Journey $journey): void
    {
        $this->_em->persist($journey);
    }

    /**
     * @param Journey $journey
     * @throws \Doctrine\ORM\ORMException
     */
    public function remove(Journey $journey): void
    {
        $this->_em->remove($journey);
    }

//    /**
//     * @return Journey[] Returns an array of Journey objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Journey
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
