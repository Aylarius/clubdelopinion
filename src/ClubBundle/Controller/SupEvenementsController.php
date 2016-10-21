<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\SupEvenements;
use ClubBundle\Entity\Club;
use ClubBundle\Form\SupEvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Supevenement controller.
 *
 */
class SupEvenementsController extends Controller
{
    /**
     * Lists all supEvenement entities.
     *
     */
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $supEvenements = $em->getRepository('ClubBundle:SupEvenements')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:supevenements:index.html.twig', array(
            'supEvenements' => $supEvenements,
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new supEvenement entity.
     *
     
    public function newAction(Request $request)
    {
        $supEvenement = new Supevenement();
        $form = $this->createForm('ClubBundle\Form\SupEvenementsType', $supEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($supEvenement);
            $em->flush($supEvenement);

            return $this->redirectToRoute('supevenements_show', array('id' => $supEvenement->getId()));
        }

        return $this->render('ClubBundle:supevenements/new.html.twig', array(
            'supEvenement' => $supEvenement,
            'form' => $form->createView(),
        ));
    } */

    /**
     * Finds and displays a supEvenement entity.
     *
     */
    public function showAction(SupEvenements $supEvenement)
    {
        $deleteForm = $this->createDeleteForm($supEvenement);
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:supevenements:show.html.twig', array(
            'supEvenement' => $supEvenement,
            'delete_form' => $deleteForm->createView(),
            'clubs' => $clubs,
        ));
    }

    /**
     * Displays a form to edit an existing supEvenement entity.
     *
     */
    public function editAction(Request $request, SupEvenements $supEvenement)
    {
        $deleteForm = $this->createDeleteForm($supEvenement);
        $editForm = $this->createForm('ClubBundle\Form\SupEvenementsType', $supEvenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evsup_edit', array('id'=> 1));
        }
        
        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:supevenements:edit.html.twig', array(
            'supEvenement' => $supEvenement,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a supEvenement entity.
     *
     */
    public function deleteAction(Request $request, SupEvenements $supEvenement)
    {
        $form = $this->createDeleteForm($supEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($supEvenement);
            $em->flush($supEvenement);
        }

        return $this->redirectToRoute('evsup_edit', array('id'=> 1));
    }

    /**
     * Creates a form to delete a supEvenement entity.
     *
     * @param SupEvenements $supEvenement The supEvenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SupEvenements $supEvenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supevenements_delete', array('id' => $supEvenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
