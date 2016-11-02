<?php

namespace ClubBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use ClubBundle\Entity\EvAra;
use ClubBundle\Form\EvAraType;
use ClubBundle\Entity\Club;
use ClubBundle\Entity\AraEvenements;
use ClubBundle\Form\AraEvenementsType;

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
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        $EvEm = $this->getDoctrine()->getManager();
        $araEvenements = $EvEm->getRepository('ClubBundle:AraEvenements')->findAll();

        return $this->render('ClubBundle:evara:index.html.twig', array(
            'evAras' => $evAras,
            'clubs' => $clubs,
            'araEvenements' => $araEvenements,

        ));
    }
    
    /**
     * Displays a form to edit an existing evAra entity.
     *
     */
    public function editAction(Request $request, EvAra $evAra)
    {
        /*$deleteForm = $this->createDeleteForm($evAra);*/

        /* Formulaire Edition de la Page Evènements ARA */
        $editForm = $this->createForm('ClubBundle\Form\EvAraType', $evAra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evara_edit', array('id' => $evAra->getId()));
        }
        /* Récupération des données de l'entité Evenements pour afficher les Evenements ARA */
        $EvEm = $this->getDoctrine()->getManager();
        $araEvenements = $EvEm->getRepository('ClubBundle:AraEvenements')->findAll();

        /* Formulaire Nouvel Evenement ARA */
        $araEvenement = new AraEvenements();
        $newForm = $this->createForm('ClubBundle\Form\AraEvenementsType', $araEvenement);
        $newForm->handleRequest($request);

        if ($newForm->isSubmitted() && $newForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($araEvenement);
            $em->flush($araEvenement);

            return $this->redirectToRoute('evara_edit', array('id' => $evAra->getId()));
        }

        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        
        return $this->render('ClubBundle:evara:edit.html.twig', array(
            'evAra' => $evAra,
            'araEvenements' => $araEvenements,
            'araEvenement' => $araEvenement,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'new_form' => $newForm->createView(),
        ));
    }

    /**
     * Deletes a evAra entity.
     *
     
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
    }*/

    /**
     * Creates a form to delete a evAra entity.
     *
     * @param EvAra $evAra The evAra entity
     *
     * @return \Symfony\Component\Form\Form The form
     
    private function createDeleteForm(EvAra $evAra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evara_delete', array('id' => $evAra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }*/

}
