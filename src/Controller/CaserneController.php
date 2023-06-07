<?php

namespace App\Controller;

use App\Entity\Caserne;
use App\Form\CaserneType;
use App\Repository\CaserneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/caserne')]
class CaserneController extends AbstractController
{
    #[Route('/', name: 'app_caserne_index', methods: ['GET'])]
    public function index(CaserneRepository $caserneRepository): Response
    {
        return $this->render('caserne/index.html.twig', [
            'casernes' => $caserneRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_caserne_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CaserneRepository $caserneRepository): Response
    {
        $caserne = new Caserne();
        $form = $this->createForm(CaserneType::class, $caserne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caserneRepository->save($caserne, true);

            return $this->redirectToRoute('app_caserne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('caserne/new.html.twig', [
            'caserne' => $caserne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_caserne_show', methods: ['GET'])]
    public function show(Caserne $caserne): Response
    {
        return $this->render('caserne/show.html.twig', [
            'caserne' => $caserne,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_caserne_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Caserne $caserne, CaserneRepository $caserneRepository): Response
    {
        $form = $this->createForm(CaserneType::class, $caserne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caserneRepository->save($caserne, true);

            return $this->redirectToRoute('app_caserne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('caserne/edit.html.twig', [
            'caserne' => $caserne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_caserne_delete', methods: ['POST'])]
    public function delete(Request $request, Caserne $caserne, CaserneRepository $caserneRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$caserne->getId(), $request->request->get('_token'))) {
            $caserneRepository->remove($caserne, true);
        }

        return $this->redirectToRoute('app_caserne_index', [], Response::HTTP_SEE_OTHER);
    }
}
