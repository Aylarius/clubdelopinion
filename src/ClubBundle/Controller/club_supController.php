<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\club_sup;
use ClubBundle\Form\club_supType;

/**
 * club_sup controller.
 *
 */
class club_supController extends Controller
{
    /**
     * Lists all club_sup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $club_sups = $em->getRepository('ClubBundle:club_sup')->findAll();

        return $this->render('ClubBundle:club_sup:index.html.twig', array(
            'club_sups' => $club_sups,
        ));
    }

    /**
     * Creates a new club_sup entity.
     *
     */
    public function newAction(Request $request)
    {
        $club_sup = new club_sup();
        $form = $this->createForm('ClubBundle\Form\club_supType', $club_sup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club_sup);
            $em->flush();

            return $this->redirectToRoute('club_sup_show', array('id' => $club_sup->getId()));
        }

        return $this->render('ClubBundle:club_sup:new.html.twig', array(
            'club_sup' => $club_sup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a club_sup entity.
     *
     */
    public function showAction(club_sup $club_sup)
    {
        $deleteForm = $this->createDeleteForm($club_sup);

        return $this->render('ClubBundle:club_sup:show.html.twig', array(
            'club_sup' => $club_sup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing club_sup entity.
     *
     */
    public function editAction(Request $request, club_sup $club_sup)
    {
        $deleteForm = $this->createDeleteForm($club_sup);
        $editForm = $this->createForm('ClubBundle\Form\club_supType', $club_sup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club_sup);
            $em->flush();

            return $this->redirectToRoute('club_sup_edit', array('id' => $club_sup->getId()));
        }

        return $this->render('ClubBundle:club_sup:edit.html.twig', array(
            'club_sup' => $club_sup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a club_sup entity.
     *
     */
    public function deleteAction(Request $request, club_sup $club_sup)
    {
        $form = $this->createDeleteForm($club_sup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club_sup);
            $em->flush();
        }

        return $this->redirectToRoute('club_sup_index');
    }

    /**
     * Creates a form to delete a club_sup entity.
     *
     * @param club_sup $club_sup The club_sup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(club_sup $club_sup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('club_sup_delete', array('id' => $club_sup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
