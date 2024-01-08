<?php

namespace App\Repository;

use App\Entity\DeptTitle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Cette classe représente le repository pour l'entité DeptTitle.
 *
 * @extends ServiceEntityRepository<DeptTitle>
 */
class DeptTitleRepository extends ServiceEntityRepository
{
    /**
     * Constructeur de la classe.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeptTitle::class);
    }

    /**
     * Recherche les postes par titre.
     *
     * @param string $title
     *
     * @return array<DeptTitle>
     */
    public function findByTitle(string $title): array
    {
        // Création d'une requête pour récupérer les postes par titre spécifié
        return $this->createQueryBuilder('dt')
            ->andWhere('dt.title = :title') // Filtrer par le titre
            ->setParameter('title', $title) // Définir le paramètre du titre
            ->getQuery() // Obtenir la requête
            ->getResult(); // Récupérer les résultats
    }

    /**
     * Recherche les postes par département.
     *
     * @param string $departmentNo
     *
     * @return array<DeptTitle>
     */
    public function findByDepartment(string $departmentNo): array
    {
        // Création d'une requête pour récupérer les postes par numéro de département spécifié
        return $this->createQueryBuilder('dt')
            ->leftJoin('dt.departement', 'd') // Jointure avec l'entité département associée
            ->andWhere('d.deptNo = :deptNo') // Filtrer par numéro de département
            ->setParameter('deptNo', $departmentNo) // Définir le paramètre du numéro de département
            ->getQuery() // Obtenir la requête
            ->getResult(); // Récupérer les résultats
    }
}
