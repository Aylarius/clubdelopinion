<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\EvSup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evsup controller.
 *
 */
class EvSupController extends Controller
{
    /**
     * Lists all evSup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evSups = $em->getRepository('ClubBundle:EvSup')->findAll();

        return $this->render('ClubBundle:EvSup:index.html.twig', array(
            'evSups' => $evSups,
        ));
    }

    /**
     * Creates a new evSup entity.
     *
     */
    public function newAction(Request $request)
    {
        $evSup = new Evsup();
        $form = $this->createForm('ClubBundle\Form\EvSupType', $evSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evSup);
            $em->flush($evSup);

            return $this->redirectToRoute('evsup_show', array('id' => $evSup->getId()));
        }

        return $this->render('ClubBundle:EvSup:new.html.twig', array(
            'evSup' => $evSup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evSup entity.
     *
     */
    public function showAction(EvSup $evSup)
    {
        $deleteForm = $this->createDeleteForm($evSup);

        return $this->render('ClubBundle:EvSup:show.html.twig', array(
            'evSup' => $evSup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evSup entity.
     *
     */
    public function editAction(Request $request, EvSup $evSup)
    {
        $deleteForm = $this->createDeleteForm($evSup);
        $editForm = $this->createForm('ClubBundle\Form\EvSupType', $evSup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evsup_edit', array('id' => $evSup->getId()));
        }

        return $this->render('ClubBundle:EvSup:edit.html.twig', array(
            'evSup' => $evSup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evSup entity.
     *
     */
    public function deleteAction(Request $request, EvSup $evSup)
    {
        $form = $this->createDeleteForm($evSup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evSup);
            $em->flush($evSup);
        }

        return $this->redirectToRoute('evsup_index');
    }

    /**
     * Creates a form to delete a evSup entity.
     *
     * @param EvSup $evSup The evSup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EvSup $evSup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evsup_delete', array('id' => $evSup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
