<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//jerome
class DepartementController extends AbstractController
{
    #[Route('/departement', name: 'app_departement', methods:['GET'])]
    public function index(DepartementRepository $dr): Response
    {
        $departementsData = $dr->findAll();
        
        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
            "departements" => $departementsData,
           

        ]);
    }

    #[Route('/new', name: 'app_departement_new')]
    public function new(DepartementRepository $dr): Response
    {




        return $this->render('departement/new.html.twig', [
            'controller_name' => 'DepartementController',
            
           

        ]);
    }

  
}
