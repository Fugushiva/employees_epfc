<?php

namespace App\Controller;

use App\Entity\DeptTitle;
use App\Entity\Departement;
use App\Repository\DepartementRepository;
use App\Repository\DeptTitleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeptTitleController extends AbstractController
{
    #[Route('/dept_title', name: 'app_dept_title')]
    public function index(DeptTitleRepository $dt): Response
    {
       
        $deptTitleData = $dt->findAll();
        
        return $this->render('dept_title/index.html.twig', [
            'controller_name' => 'DeptTitleController',
            "postes" => $deptTitleData
        ]);
    }

    //Afficher les postes vacants
    #[Route('/dept_title', name: 'app_dept_title_show')]
    public function show(EntityManagerInterface $dt): Response
    {
        return $this->render('dept_title/show.html.twig', [
            'controller_name' => 'DeptTitleController',
            
        ]);
    }

}