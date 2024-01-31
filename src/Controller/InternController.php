<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Entity\Employee;
use App\Entity\Intern;
use App\Form\InternType;
use App\Repository\DepartementRepository;
use App\Repository\InternRepository;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/intern')]
class InternController extends AbstractController
{
    #[Route('/', name: 'app_intern_index', methods: ['GET'])]
    public function index(InternRepository $internRepository): Response
    {
        return $this->render('intern/index.html.twig', [
            'interns' => $internRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_intern_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $intern = new Intern();
        $form = $this->createForm(InternType::class, $intern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($intern);
            $entityManager->flush();

            return $this->redirectToRoute('app_intern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intern/new.html.twig', [
            'intern' => $intern,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intern_show', methods: ['GET'])]
    public function show(Intern $intern): Response
    {
        return $this->render('intern/show.html.twig', [
            'intern' => $intern,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_intern_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Intern $intern, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InternType::class, $intern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_intern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('intern/edit.html.twig', [
            'intern' => $intern,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intern_delete', methods: ['POST'])]
    public function delete(Request $request, Intern $intern, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intern->getId(), $request->request->get('_token'))) {
            $entityManager->remove($intern);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_intern_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/employee/{id}', name: 'app_intern_show_mine', methods: ['GET'])]
    public function showMine(InternRepository $ir, Employee $employee, EmployeeRepository $er, DepartementRepository $dr): Response
    {

        $departement = $dr->findAll();

        $empNo = $employee->getId();

        $intern = $ir->findAllInternsOrderedByDepartmentAndEmployee();
        $internsLj = $ir->findAllInternsLeftJoinOrderedByDepartmentAndEmployee();
        $myInterns = $ir->findMyInterns($empNo);

        $empWithoutInterns = $er->empNameWithoutInterns($employee);
        

        return $this->render('intern/showMine.html.twig', [
            'interns' => $intern,
            'empWithoutInterns' => $empWithoutInterns,
            'departements' => $departement,
            'internsLj' => $internsLj,
            'myInterns' => $myInterns
            
        ]);
    }

    #[Route('/employee/{id}/intern/{intern_id}/update', name: 'app_intern_update', methods: ['GET', 'POST'])]

    public function update(int $id, int $intern_id, InternRepository $ir): Response
    {
        $ir->updateSupervisor($id, $intern_id);
        return $this->redirectToRoute('app_intern_show_mine', ['id' => $id], Response::HTTP_SEE_OTHER);
    }

    #[Route('/employee/{id}/intern/{intern_id}/unsup', name: 'app_intern_unsup', methods: ['GET', 'POST'])]

    public function unSup(int $id, int $intern_id, InternRepository $ir): Response
    {
        $ir->unSupervise($intern_id);
        return $this->redirectToRoute('app_intern_show_mine', ['id' => $id], Response::HTTP_SEE_OTHER);
    }

    #[Route('/employee/{id}/intern/{intern_id}/sup', name: 'app_intern_sup', methods: ['GET', 'POST'])]

    public function sup(int $id, int $intern_id, InternRepository $ir): Response
    {
        $ir->supervise($intern_id, $id);
        return $this->redirectToRoute('app_intern_show_mine', ['id' => $id], Response::HTTP_SEE_OTHER);
    }


}