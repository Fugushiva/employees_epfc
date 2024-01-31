<?php

namespace App\Repository;

use App\Entity\Intern;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Intern>
 *
 * @method Intern|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intern|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intern[]    findAll()
 * @method Intern[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intern::class);
    }

    public function findMyInterns($empNo): array
    {
        $currentDate = new \DateTime(); // Obtenir la date actuelle


        return $this->createQueryBuilder('interns')
            ->andWhere('interns.empNo IS NULL OR interns.empNo = :val')
            ->andWhere('interns.endDate > :now') // Ajouter une condition pour vérifier si endDate est dans le futur
            ->setParameter('val', $empNo)
            ->setParameter('now', $currentDate->format('Y-m-d H:i:s')) // Passer la date actuelle comme paramètre
            ->orderBy('interns.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function updateSupervisor($empNo, $internId): void
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'UPDATE App\Entity\Intern i
            SET i.empNo = :empNo
            WHERE i.id = :internId'
        )->setParameter('empNo', $empNo)
            ->setParameter('internId', $internId);

        $query->execute();
    }

    public function findAllInternsOrderedByDepartmentAndEmployee(): array
    {
        // Utilisation de createQueryBuilder sans passer par l'EntityManager directement
        // 'i' est un alias que vous donnez à l'entité Intern dans la requête
        return $this->createQueryBuilder('i')
            ->orderBy('i.deptNo', 'ASC')
            ->addOrderBy('i.empNo', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllInternsLeftJoinOrderedByDepartmentAndEmployee()
    {
        return $this->createQueryBuilder('i')
            ->leftJoin('App\Entity\Employee', 'c', 'WITH', 'i.empNo = c.id')
            ->orderBy('i.deptNo', 'ASC')
            ->addOrderBy('i.empNo', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function unSupervise($internId): int
    {
        $queryBuilder = $this->createQueryBuilder('i')
            ->update()
            ->set('i.empNo', 'NULL')
            ->where('i.id = :id')
            ->setParameter('id', $internId);

        return $queryBuilder->getQuery()->execute();
    }

    public function supervise($internId, $empNo): int
    {
        $queryBuilder = $this->createQueryBuilder('i')
            ->update()
            ->set('i.empNo', ':empNo')
            ->where('i.id = :id')
            ->setParameters([
                'empNo' => $empNo,
                'id' => $internId
            ]);

        return $queryBuilder->getQuery()->execute();
    }







    //    /**
    //     * @return Intern[] Returns an array of Intern objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Intern
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}
