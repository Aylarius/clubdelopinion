<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Evenements;
use ClubBundle\Entity\Club;
use ClubBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evenement controller.
 *
 */
class EvenementsController extends Controller
{

    /**
     * Displays a form to edit an existing evenement entity.
     *
     */
    public function editAction(Request $request, Evenements $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('ClubBundle\Form\EvenementsType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evrcvl_edit', array('id'=> 1));
        }
        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:Evenements:edit.html.twig', array(
            'evenement' => $evenement,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     */
    public function deleteAction(Request $request, Evenements $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush($evenement);
        }

        return $this->redirectToRoute('evrcvl_edit', array('id'=> 1));
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenements $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenements $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenements_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Finds and displays a evenement entity.
     *

    public function showAction(Evenements $evenement)
    {
    $deleteForm = $this->createDeleteForm($evenement);

    return $this->render('ClubBundle:Evenements:show.html.twig', array(
    'evenement' => $evenement,
    'delete_form' => $deleteForm->createView(),
    ));
    }*/

    /**
     * Creates a new evenement entity.
     *

    public function newAction(Request $request)
    {
    $evenement = new Evenement();
    $form = $this->createForm('ClubBundle\Form\EvenementsType', $evenement);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($evenement);
    $em->flush($evenement);

    return $this->redirectToRoute('evenements_show', array('id' => $evenement->getId()));
    }

    return $this->render('ClubBundle:Evenements:new.html.twig', array(
    'evenement' => $evenement,
    'form' => $form->createView(),
    ));
    }*/

    /**
     * Lists all evenement entities.
     *

    public function indexAction()
    {
    $em = $this->getDoctrine()->getManager();

    $evenements = $em->getRepository('ClubBundle:Evenements')->findAll();

    return $this->render('ClubBundle:Evenements:index.html.twig', array(
    'evenements' => $evenements,
    ));
    }*/
}
