<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\av3;
use ClubBundle\Form\av3Type;
use ClubBundle\Entity\Club;

/**
 * av3 controller.
 *
 */
class av3Controller extends Controller
{
    /**
     * Lists all av3 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $av3s = $em->getRepository('ClubBundle:av3')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:av3:index.html.twig', array(
            'av3s' => $av3s,
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new av3 entity.
     *
     */
    public function newAction(Request $request)
    {
        $av3 = new av3();
        $form = $this->createForm('ClubBundle\Form\av3Type', $av3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($av3);
            $em->flush();

            return $this->redirectToRoute('av3_show', array('id' => $av3->getId()));
        }

        return $this->render('ClubBundle:av3:new.html.twig', array(
            'av3' => $av3,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a av3 entity.
     *
     */
    public function showAction(av3 $av3)
    {
        $deleteForm = $this->createDeleteForm($av3);

        return $this->render('ClubBundle:av3:show.html.twig', array(
            'av3' => $av3,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing av3 entity.
     *
     */
    public function editAction(Request $request, av3 $av3)
    {
        $deleteForm = $this->createDeleteForm($av3);
        $editForm = $this->createForm('ClubBundle\Form\av3Type', $av3);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($av3);
            $em->flush();

            return $this->redirectToRoute('av3_edit', array('id' => $av3->getId()));
        }

        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:av3:edit.html.twig', array(
            'av3' => $av3,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a av3 entity.
     *
     */
    public function deleteAction(Request $request, av3 $av3)
    {
        $form = $this->createDeleteForm($av3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($av3);
            $em->flush();
        }

        return $this->redirectToRoute('av3_index');
    }

    /**
     * Creates a form to delete a av3 entity.
     *
     * @param av3 $av3 The av3 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(av3 $av3)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('av3_delete', array('id' => $av3->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
