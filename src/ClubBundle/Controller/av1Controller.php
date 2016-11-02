<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\av1;
use ClubBundle\Form\av1Type;
use ClubBundle\Entity\Club;

/**
 * av1 controller.
 *
 */

class av1Controller extends Controller
{
    /**
     * Lists all av1 entities.
     *
     */
    

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $av1s = $em->getRepository('ClubBundle:av1')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:av1:index.html.twig', array(
            'av1s' => $av1s,
            'clubs' => $clubs,
        ));
    }

    /**
     * Finds and displays a av1 entity.
     *
     */


    /**
     * Displays a form to edit an existing av1 entity.
     *
     */
    public function editAction(Request $request, av1 $av1)
    {
        $deleteForm = $this->createDeleteForm($av1);
        $editForm = $this->createForm('ClubBundle\Form\av1Type', $av1);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($av1);
            $em->flush();

            return $this->redirectToRoute('av1_edit', array('id' => $av1->getId()));
        }
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        return $this->render('ClubBundle:av1:edit.html.twig', array(
            'av1' => $av1,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a av1 entity.
     *
     */
    public function deleteAction(Request $request, av1 $av1)
    {
        $form = $this->createDeleteForm($av1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($av1);
            $em->flush();
        }

        return $this->redirectToRoute('av1_index');
    }

    /**
     * Creates a form to delete a av1 entity.
     *
     * @param av1 $av1 The av1 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(av1 $av1)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('av1_delete', array('id' => $av1->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
