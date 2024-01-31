<?php

namespace App\Repository;

use App\Entity\CarEmp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarEmp>
 *
 * @method CarEmp|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarEmp|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarEmp[]    findAll()
 * @method CarEmp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarEmpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarEmp::class);
    }

//    /**
//     * @return CarEmp[] Returns an array of CarEmp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarEmp
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
