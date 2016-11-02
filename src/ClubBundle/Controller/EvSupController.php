<?php

namespace ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\EvSup;
use ClubBundle\Form\EvSupType;
use ClubBundle\Entity\SupEvenements;
use ClubBundle\Form\SupEvenementsType;

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
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        $EvEm = $this->getDoctrine()->getManager();
        $supEvenements = $EvEm->getRepository('ClubBundle:SupEvenements')->findAll();
        
        return $this->render('ClubBundle:evsup:index.html.twig', array(
            'evSups' => $evSups,
            'clubs' => $clubs,
            'supEvenements' => $supEvenements,
        ));
    }

    /**
     * Displays a form to edit an existing evSup entity.
     *
     */
    public function editAction(Request $request, EvSup $evSup)
    {
        //$deleteForm = $this->createDeleteForm($evSup);
        /* Formulaire Edition de la Page Evenements RCVL */
        $editForm = $this->createForm('ClubBundle\Form\EvSupType', $evSup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evsup_edit', array('id' => $evSup->getId()));
        }
        /* Récupération des données de l'entité Evenements pour afficher les Evenements */
        $EvEm = $this->getDoctrine()->getManager();
        $supEvenements = $EvEm->getRepository('ClubBundle:SupEvenements')->findAll();

        /* Formulaire Nouvel Evenement */
        $supEvenement = new SupEvenements();
        $newForm = $this->createForm('ClubBundle\Form\SupEvenementsType', $supEvenement);
        $newForm ->handleRequest($request);

        if ($newForm->isSubmitted() && $newForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($supEvenement);
            $em->flush($supEvenement);

            return $this->redirectToRoute('evsup_edit', array('id' => $evSup->getId()));
        }
        
        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        
        return $this->render('ClubBundle:evsup:edit.html.twig', array(
            'supEvenement' => $supEvenement,
            'supEvenements' => $supEvenements,
            'evSup' => $evSup,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'new_form' => $newForm->createView(),
        ));
    }

    /**
     * Deletes a evSup entity.
     *
     
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
    }*/

    /**
     * Creates a form to delete a evSup entity.
     *
     * @param EvSup $evSup The evSup entity
     *
     * @return \Symfony\Component\Form\Form The form
     
    private function createDeleteForm(EvSup $evSup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evsup_delete', array('id' => $evSup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }*/
}
