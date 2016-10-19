<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\EvAra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evara controller.
 *
 */
class EvAraController extends Controller
{
    /**
     * Lists all evAra entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evAras = $em->getRepository('ClubBundle:EvAra')->findAll();

        return $this->render('ClubBundle:EvAra:index.html.twig', array(
            'evAras' => $evAras,
        ));
    }

    /**
     * Creates a new evAra entity.
     *
     */
    public function newAction(Request $request)
    {
        $evAra = new Evara();
        $form = $this->createForm('ClubBundle\Form\EvAraType', $evAra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evAra);
            $em->flush($evAra);

            return $this->redirectToRoute('evara_show', array('id' => $evAra->getId()));
        }

        return $this->render('ClubBundle:EvAra:new.html.twig', array(
            'evAra' => $evAra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evAra entity.
     *
     */
    public function showAction(EvAra $evAra)
    {
        $deleteForm = $this->createDeleteForm($evAra);

        return $this->render('ClubBundle:EvAra:show.html.twig', array(
            'evAra' => $evAra,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evAra entity.
     *
     */
    public function editAction(Request $request, EvAra $evAra)
    {
        $deleteForm = $this->createDeleteForm($evAra);
        $editForm = $this->createForm('ClubBundle\Form\EvAraType', $evAra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evara_edit', array('id' => $evAra->getId()));
        }

        return $this->render('ClubBundle:EvAra:edit.html.twig', array(
            'evAra' => $evAra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evAra entity.
     *
     */
    public function deleteAction(Request $request, EvAra $evAra)
    {
        $form = $this->createDeleteForm($evAra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evAra);
            $em->flush($evAra);
        }

        return $this->redirectToRoute('evara_index');
    }

    /**
     * Creates a form to delete a evAra entity.
     *
     * @param EvAra $evAra The evAra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EvAra $evAra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evara_delete', array('id' => $evAra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
