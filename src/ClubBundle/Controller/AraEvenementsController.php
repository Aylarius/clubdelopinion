<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\AraEvenements;
use ClubBundle\Entity\Club;
use ClubBundle\Form\AraEvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Araevenement controller.
 *
 */
class AraEvenementsController extends Controller
{

    /**
     * Displays a form to edit an existing araEvenement entity.
     *
     */
    public function editAction(Request $request, AraEvenements $araEvenement)
    {
        $deleteForm = $this->createDeleteForm($araEvenement);
        $editForm = $this->createForm('ClubBundle\Form\AraEvenementsType', $araEvenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evara_edit', array('id'=> 1));
        }
        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:araevenements:edit.html.twig', array(
            'araEvenement' => $araEvenement,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a araEvenement entity.
     *
     */
    public function deleteAction(Request $request, AraEvenements $araEvenement)
    {
        $form = $this->createDeleteForm($araEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($araEvenement);
            $em->flush($araEvenement);
        }

        return $this->redirectToRoute('evara_edit', array('id'=> 1));
    }

    /**
     * Creates a form to delete a araEvenement entity.
     *
     * @param AraEvenements $araEvenement The araEvenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AraEvenements $araEvenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('araevenements_delete', array('id' => $araEvenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Lists all araEvenement entities.
     *

    public function indexAction()
    {
    $em = $this->getDoctrine()->getManager();

    $araEvenements = $em->getRepository('ClubBundle:AraEvenements')->findAll();

    return $this->render('ClubBundle:araevenements:index.html.twig', array(
    'araEvenements' => $araEvenements,
    ));
    }*/

    /**
     * Creates a new araEvenement entity.
     *

    public function newAction(Request $request)
    {
    $araEvenement = new Araevenement();
    $form = $this->createForm('ClubBundle\Form\AraEvenementsType', $araEvenement);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($araEvenement);
    $em->flush($araEvenement);

    return $this->redirectToRoute('araevenements_show', array('id' => $araEvenement->getId()));
    }

    return $this->render('ClubBundle:araevenements:new.html.twig', array(
    'araEvenement' => $araEvenement,
    'form' => $form->createView(),
    ));
    }*/

    /**
     * Finds and displays a araEvenement entity.
     *
     */
    
    public function showAction(AraEvenements $araEvenement)
    {
        $deleteForm = $this->createDeleteForm($araEvenement);
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        
    return $this->render('ClubBundle:araevenements:show.html.twig', array(
        'araEvenement' => $araEvenement,
        'clubs' => $clubs,
        'delete_form' => $deleteForm->createView(),
    ));
        
    }

}
