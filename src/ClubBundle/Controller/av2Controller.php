<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\av2;
use ClubBundle\Form\av2Type;

/**
 * av2 controller.
 *
 */
class av2Controller extends Controller
{
    /**
     * Lists all av2 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $av2s = $em->getRepository('ClubBundle:av2')->findAll();

        return $this->render('ClubBundle:av2:index.html.twig', array(
            'av2s' => $av2s,
        ));
    }

    /**
     * Creates a new av2 entity.
     *
     */
    public function newAction(Request $request)
    {
        $av2 = new av2();
        $form = $this->createForm('ClubBundle\Form\av2Type', $av2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($av2);
            $em->flush();

            return $this->redirectToRoute('av2_show', array('id' => $av2->getId()));
        }

        return $this->render('ClubBundle:av2:new.html.twig', array(
            'av2' => $av2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a av2 entity.
     *
     */
    public function showAction(av2 $av2)
    {
        $deleteForm = $this->createDeleteForm($av2);

        return $this->render('ClubBundle:av2:show.html.twig', array(
            'av2' => $av2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing av2 entity.
     *
     */
    public function editAction(Request $request, av2 $av2)
    {
        $deleteForm = $this->createDeleteForm($av2);
        $editForm = $this->createForm('ClubBundle\Form\av2Type', $av2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($av2);
            $em->flush();

            return $this->redirectToRoute('av2_edit', array('id' => $av2->getId()));
        }

        return $this->render('ClubBundle:av2:edit.html.twig', array(
            'av2' => $av2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a av2 entity.
     *
     */
    public function deleteAction(Request $request, av2 $av2)
    {
        $form = $this->createDeleteForm($av2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($av2);
            $em->flush();
        }

        return $this->redirectToRoute('av2_index');
    }

    /**
     * Creates a form to delete a av2 entity.
     *
     * @param av2 $av2 The av2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(av2 $av2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('av2_delete', array('id' => $av2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
