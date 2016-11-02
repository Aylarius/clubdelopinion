<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\presentation;
use ClubBundle\Form\presentationType;
use ClubBundle\Entity\Club;

/**
 * presentation controller.
 *
 */
class presentationController extends Controller
{
    /**
     * Lists all presentation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $presentations = $em->getRepository('ClubBundle:presentation')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:presentation:index.html.twig', array(
            'presentations' => $presentations,
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new presentation entity.
     *
     */
    public function newAction(Request $request)
    {
        $presentation = new presentation();
        $form = $this->createForm('ClubBundle\Form\presentationType', $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presentation);
            $em->flush();

            return $this->redirectToRoute('presentation_show', array('id' => $presentation->getId()));
        }

        return $this->render('ClubBundle:presentation:new.html.twig', array(
            'presentation' => $presentation,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to edit an existing presentation entity.
     *
     */
    public function editAction(Request $request, presentation $presentation)
    {
        $deleteForm = $this->createDeleteForm($presentation);
        $editForm = $this->createForm('ClubBundle\Form\presentationType', $presentation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presentation);
            $em->flush();

            return $this->redirectToRoute('presentation_edit', array('id' => $presentation->getId()));
        }

        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:presentation:edit.html.twig', array(
            'presentation' => $presentation,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a presentation entity.
     *
     */
    public function deleteAction(Request $request, presentation $presentation)
    {
        $form = $this->createDeleteForm($presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($presentation);
            $em->flush();
        }

        return $this->redirectToRoute('presentation_index');
    }

    /**
     * Creates a form to delete a presentation entity.
     *
     * @param presentation $presentation The presentation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(presentation $presentation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_delete', array('id' => $presentation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
