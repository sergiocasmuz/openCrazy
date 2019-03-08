<?php

namespace App\Controller;

use App\Entity\Planilleros;
use App\Form\PlanillerosType;
use App\Repository\PlanillerosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planilleros")
 */
class PlanillerosController extends AbstractController
{
    /**
     * @Route("/", name="planilleros_index", methods={"GET"})
     */
    public function index(PlanillerosRepository $planillerosRepository): Response
    {
        return $this->render('planilleros/index.html.twig', [
            'planilleros' => $planillerosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="planilleros_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $planillero = new Planilleros();
        $form = $this->createForm(PlanillerosType::class, $planillero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planillero);
            $entityManager->flush();

            return $this->redirectToRoute('planilleros_index');
        }

        return $this->render('planilleros/new.html.twig', [
            'planillero' => $planillero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planilleros_show", methods={"GET"})
     */
    public function show(Planilleros $planillero): Response
    {
        return $this->render('planilleros/show.html.twig', [
            'planillero' => $planillero,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="planilleros_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Planilleros $planillero): Response
    {
        $form = $this->createForm(PlanillerosType::class, $planillero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planilleros_index', [
                'id' => $planillero->getId(),
            ]);
        }

        return $this->render('planilleros/edit.html.twig', [
            'planillero' => $planillero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planilleros_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Planilleros $planillero): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planillero->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planillero);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planilleros_index');
    }
}
