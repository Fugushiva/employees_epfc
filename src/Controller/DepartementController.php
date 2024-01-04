<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Form\DepartementType;
use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;




//jerome
class DepartementController extends AbstractController
{
    #[Route('/departement', name: 'app_departement_index', methods: ['GET'])]
    public function index(DepartementRepository $dr): Response
    {
        $departementsData = $dr->findAll();

        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
            "departements" => $departementsData,


        ]);
    }

    #[Route('/new', name: 'app_departement_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {

        $departement = new Departement();

        $departementForm = $this->createForm(DepartementType::class, $departement);

        $departementForm->handleRequest($request);

        if ($departementForm->isSubmitted() && $departementForm->isValid()) {
            $em->persist($departement);
            $em->flush();

            return $this->redirectToRoute('app_department_index', [], Response::HTTP_SEE_OTHER);
        }



        return $this->render('departement/new.html.twig', [
            'form' => $departementForm,



        ]);
    }
}
