<?php

namespace App\Controller;

use App\Entity\DeptTitle;
use App\Repository\DeptTitleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeptTitleController extends AbstractController
{
    //Affichage de tout les postes qui sont disponible 
    #[Route('/dept_title', name: 'app_dept_title')]
    public function index(DeptTitleRepository $dt): Response
    {
       //Le tableau qui va reunir toutes les datas
        $deptTitleData = $dt->findAll();
        
        return $this->render('dept_title/index.html.twig', [
            'controller_name' => 'DeptTitleController',
            "postes" => $deptTitleData
        ]);
    }

    //Affichage d'un seul poste en particulier
    #[Route('/dept_title/{id}', 
        name: 'app_dept_title_show')]
    public function show(EntityManagerInterface $dt, int $id): Response
    {

        $repository = $dt ->getRepository(DeptTitle::class);
        $poste = $repository->find($id);

        return $this->render('dept_title/show.html.twig', [
            'title' => 'Le poste',  
            "poste" => $poste
        ]);
    }
}