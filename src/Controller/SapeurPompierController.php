<?php

namespace App\Controller;

use App\Entity\SapeurPompier;
use App\Form\SapeurPompierType;
use App\Repository\SapeurPompierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sapeur/pompier')]
class SapeurPompierController extends AbstractController
{
    #[Route('/', name: 'app_sapeur_pompier_index', methods: ['GET'])]
    public function index(SapeurPompierRepository $sapeurPompierRepository): Response
    {
        return $this->render('sapeur_pompier/index.html.twig', [
            'sapeur_pompiers' => $sapeurPompierRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sapeur_pompier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SapeurPompierRepository $sapeurPompierRepository): Response
    {
        $sapeurPompier = new SapeurPompier();
        $form = $this->createForm(SapeurPompierType::class, $sapeurPompier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sapeurPompierRepository->save($sapeurPompier, true);

            return $this->redirectToRoute('app_sapeur_pompier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sapeur_pompier/new.html.twig', [
            'sapeur_pompier' => $sapeurPompier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sapeur_pompier_show', methods: ['GET'])]
    public function show(SapeurPompier $sapeurPompier): Response
    {
        return $this->render('sapeur_pompier/show.html.twig', [
            'sapeur_pompier' => $sapeurPompier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sapeur_pompier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SapeurPompier $sapeurPompier, SapeurPompierRepository $sapeurPompierRepository): Response
    {
        $form = $this->createForm(SapeurPompierType::class, $sapeurPompier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sapeurPompierRepository->save($sapeurPompier, true);

            return $this->redirectToRoute('app_sapeur_pompier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sapeur_pompier/edit.html.twig', [
            'sapeur_pompier' => $sapeurPompier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sapeur_pompier_delete', methods: ['POST'])]
    public function delete(Request $request, SapeurPompier $sapeurPompier, SapeurPompierRepository $sapeurPompierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sapeurPompier->getId(), $request->request->get('_token'))) {
            $sapeurPompierRepository->remove($sapeurPompier, true);
        }

        return $this->redirectToRoute('app_sapeur_pompier_index', [], Response::HTTP_SEE_OTHER);
    }
}
