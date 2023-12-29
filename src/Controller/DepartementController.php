<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Repository\DepartementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartementController extends AbstractController
{
    #[Route('/departement', name: 'app_departement')]
    public function index(DepartementRepository $dr): Response
    {

      


        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
            
        ]);
    }

    //Affiche les données demandées des départements
    #[Route('/departement', name: 'app_departement_show')]
    public function show(EntityManagerInterface $em): Response
    {


        return $this->render('departement/show.html.twig', [
            'controller_name' => 'DepartementController',
        ]);
    }
}
