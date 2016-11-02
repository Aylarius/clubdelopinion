<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\club_sup;
use ClubBundle\Entity\av3;
use ClubBundle\Entity\EvSup;
use ClubBundle\Form\ClubType;
use ClubBundle\Form\av3Type;
use ClubBundle\Form\club_supType;
use ClubBundle\Form\EvSupType;


/**
 * Club controller.
 *
 */
class ClubController extends Controller
{
    /**
     * Lists all Club entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clubs = $em->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:club:index.html.twig', array(
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new Club entity.
     *
     */
    public function newAction(Request $request)
    {
        $club = new Club();
        $form = $this->createForm('ClubBundle\Form\ClubType', $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('club_show', array('id' => $club->getId()));
        }

        return $this->render('ClubBundle:club:new.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Club entity.
     *
     */
    public function showAction(Club $club)
    {
        $deleteForm = $this->createDeleteForm($club);

        return $this->render('ClubBundle:club:show.html.twig', array(
            'club' => $club,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Club entity.
     *
     */
    public function editAction(Request $request, Club $club)
    {
        $deleteForm = $this->createDeleteForm($club);
        $editForm = $this->createForm('ClubBundle\Form\ClubType', $club);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('club_edit', array('id' => $club->getId()));
        }

        /* Récupération des données de l'entité Club_Sup */
        $club_sup_Em = $this->getDoctrine()->getManager();
        $club_sups = $club_sup_Em->getRepository('ClubBundle:club_sup')->findAll();

        /* Formulaire Création Page Club_Sup */
        $club_sup = new club_sup();
        $newForm = $this->createForm('ClubBundle\Form\club_supType', $club_sup);
        $newForm->handleRequest($request);

        if ($newForm->isSubmitted() && $newForm->isValid()) {
            $club_sup_Em = $this->getDoctrine()->getManager();
            $club_sup_Em->persist($club_sup);
            $club_sup_Em->flush();

            return $this->redirectToRoute('club_edit', array('id' => $club->getId()));
        }

        /* Récupération des données de l'entité Av3 */
        $av3_Em = $this->getDoctrine()->getManager();
        $av3s = $av3_Em->getRepository('ClubBundle:av3')->findAll();

        /* Formulaire Création Page Av3 */
        $av3 = new av3();
        $newForm2 = $this->createForm('ClubBundle\Form\av3Type', $av3);
        $newForm2->handleRequest($request);

        if ($newForm2->isSubmitted() && $newForm2->isValid()) {
            $av3_Em = $this->getDoctrine()->getManager();
            $av3_Em->persist($av3);
            $av3_Em->flush();

            return $this->redirectToRoute('club_edit', array('id' => $club->getId()));
        }

        /* Récupération des données de l'entité EvSup */
        $evsup_Em = $this->getDoctrine()->getManager();
        $evSups = $evsup_Em->getRepository('ClubBundle:EvSup')->findAll();

        /* Formulaire Création Page EvSup */
        $evSup = new Evsup();
        $newForm3 = $this->createForm('ClubBundle\Form\EvSupType', $evSup);
        $newForm3->handleRequest($request);

        if ($newForm3->isSubmitted() && $newForm3->isValid()) {
            $evsup_Em = $this->getDoctrine()->getManager();
            $evsup_Em->persist($evSup);
            $evsup_Em->flush();

            return $this->redirectToRoute('club_edit', array('id' => $club->getId()));
        }

        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $em = $this->getDoctrine()->getManager();
        $clubs = $em->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:club:edit.html.twig', array(
            'club' => $club,
            'clubs' => $clubs,
            'club_sups' => $club_sups,
            'club_sup' => $club_sup,
            'evSups' => $evSups,
            'evSup' => $evSup,
            'av3s' => $av3s,
            'av3' => $av3,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'newForm' => $newForm->createView(),
            'newForm2' => $newForm2->createView(),
            'newForm3' => $newForm3->createView(),
        ));
    }

    /**
     * Deletes a Club entity.
     *
     */
    public function deleteAction(Request $request, Club $club)
    {
        $form = $this->createDeleteForm($club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club);
            $em->flush();
        }

        return $this->redirectToRoute('club_index');
    }

    /**
     * Creates a form to delete a Club entity.
     *
     * @param Club $club The Club entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Club $club)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('club_delete', array('id' => $club->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
