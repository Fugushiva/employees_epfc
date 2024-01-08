<?php

namespace App\Controller;

use App\Entity\DeptTitle;
use App\Repository\DeptTitleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeptTitleController extends AbstractController
{
    // Méthode pour afficher la liste des postes disponibles en fonction des filtres
    #[Route('/dept_title', name: 'app_dept_title')]
    public function index(Request $request, DeptTitleRepository $deptTitleRepository): Response
    {
        // Récupération des filtres pour le département et le titre
        $departmentFilter = $request->get('department', 'all');
        $titleFilter = $request->get('title');

        // Initialisation d'un tableau pour stocker les postes filtrés
        $filteredPostes = [];

        // Conditions pour appliquer les filtres et récupérer les données appropriées
        if ($departmentFilter !== 'all') {
            $filteredPostes = $deptTitleRepository->findByDepartment($departmentFilter);
        } elseif ($titleFilter !== null && $titleFilter !== 'all') {
            $filteredPostes = $deptTitleRepository->findByTitle($titleFilter);
        } else {
            $filteredPostes = $deptTitleRepository->findAll(); // Afficher tous les postes si les filtres sont vides ou si "Tous les titres" est sélectionné
        }

        // Rendu de la vue pour afficher les postes filtrés
        return $this->render('dept_title/index.html.twig', [
            'postes' => $filteredPostes,
        ]);
    }

    // Méthode pour afficher les détails d'un poste spécifique en fonction de son ID
    #[Route('/dept_title/{id}', name: 'app_dept_title_show')]
    public function show(EntityManagerInterface $entityManager, int $id, DeptTitleRepository $deptTitleRepository): Response
    {
        // Récupération du poste spécifique selon son ID
        $poste = $deptTitleRepository->find($id);

        // Vérification si le poste existe, sinon renvoyer une erreur 404
        if (!$poste) {
            throw new NotFoundHttpException('Poste non trouvé');
        }

        // Rendu de la vue pour afficher les détails du poste
        return $this->render('dept_title/show.html.twig', [
            'title' => 'Le poste',
            'poste' => $poste
        ]);
    }
}
