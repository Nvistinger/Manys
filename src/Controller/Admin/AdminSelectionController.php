<?php

namespace App\Controller\Admin;

use App\Entity\Selection;
use App\Form\SelectionType;
use App\Repository\SelectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/selection")
 */
class AdminSelectionController extends AbstractController
{
    /**
     * @Route("/", name="selection.index", methods={"GET"})
     * @param SelectionRepository $selectionRepository
     * @return Response
     */
    public function index(SelectionRepository $selectionRepository): Response
    {
        return $this->render('admin/selection/index.html.twig', [
            'current_menu' => 'selection',
            'selections' => $selectionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin.selection.new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $selection = new Selection();
        $form = $this->createForm(SelectionType::class, $selection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($selection);
            $entityManager->flush();

            return $this->redirectToRoute('selection.index');
        }

        return $this->render('admin/selection/new.html.twig', [
            'selection' => $selection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin.selection.edit", methods={"GET","POST"})
     * @param Request $request
     * @param Selection $selection
     * @return Response
     */
    public function edit(Request $request, Selection $selection): Response
    {
        $form = $this->createForm(SelectionType::class, $selection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('selection.index');
        }

        return $this->render('admin/selection/edit.html.twig', [
            'selection' => $selection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.selection.delete", methods={"DELETE"})
     * @param Request $request
     * @param Selection $selection
     * @return Response
     */
    public function delete(Request $request, Selection $selection): Response
    {
        if ($this->isCsrfTokenValid('delete'.$selection->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($selection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('selection.index');
    }
}
