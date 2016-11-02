<?php

namespace ClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\EvRcvl;
use ClubBundle\Form\EvRcvlType;
use ClubBundle\Entity\Evenements;
use ClubBundle\Form\EvenementsType;

/**
 * Evrcvl controller.
 *
 */
class EvRcvlController extends Controller
{
    /**
     * Lists all evRcvl entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evRcvls = $em->getRepository('ClubBundle:EvRcvl')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        $EvEm = $this->getDoctrine()->getManager();
        $evenements = $EvEm->getRepository('ClubBundle:Evenements')->findAll();
        
        return $this->render('ClubBundle:evrcvl:index.html.twig', array(
            'evRcvls' => $evRcvls,
            'clubs' => $clubs,
            'evenements' => $evenements,
        ));
    }

    public function editAction(Request $request, EvRcvl $evRcvl)
    {
        /*$deleteForm = $this->createDeleteForm($evRcvl);*/

        /* Formulaire Edition de la Page Evenements RCVL */
        $editForm = $this->createForm('ClubBundle\Form\EvRcvlType', $evRcvl);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evrcvl_edit', array('id' => $evRcvl->getId()));
        }
        /* Récupération des données de l'entité Evenements pour afficher les Evenements */
        $EvEm = $this->getDoctrine()->getManager();
        $evenements = $EvEm->getRepository('ClubBundle:Evenements')->findAll();

        /* Formulaire Nouvel Evenement */
        $evenement = new Evenements();
        $newForm = $this->createForm('ClubBundle\Form\EvenementsType', $evenement);
        $newForm->handleRequest($request);

        if ($newForm->isSubmitted() && $newForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush($evenement);

            return $this->redirectToRoute('evrcvl_edit', array('id' => $evRcvl->getId()));
        }

        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:evrcvl:edit.html.twig', array(
            'evRcvl' => $evRcvl,
            'clubs' => $clubs,
            'evenements' => $evenements,
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'new_form' => $newForm->createView(),
        ));
    }
    
    /**

     * Displays a form to edit an existing evRcvl entity.
     *
     */
    /**
     * Deletes a evRcvl entity.
     *

    public function deleteAction(Request $request, EvRcvl $evRcvl)
    {
        $form = $this->createDeleteForm($evRcvl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evRcvl);
            $em->flush($evRcvl);
        }

        return $this->redirectToRoute('evrcvl_index');
    }*/

    /**
     * Creates a form to delete a evRcvl entity.
     *
     * @param EvRcvl $evRcvl The evRcvl entity
     *
     * @return \Symfony\Component\Form\Form The form

    private function createDeleteForm(EvRcvl $evRcvl)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evrcvl_delete', array('id' => $evRcvl->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }*/
}
