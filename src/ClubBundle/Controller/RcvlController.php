<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\Rcvl;
use ClubBundle\Form\RcvlType;
use ClubBundle\Entity\Club;

/**
 * Rcvl controller.
 *
 */
class RcvlController extends Controller
{
    /**
     * Lists all Rcvl entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rcvls = $em->getRepository('ClubBundle:Rcvl')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:rcvl:index.html.twig', array(
            'rcvls' => $rcvls,
            'clubs' => $clubs,
        ));
    }

    /**

     * Displays a form to edit an existing Rcvl entity.
     *
     */
    public function editAction(Request $request, Rcvl $rcvl)
    {
        $deleteForm = $this->createDeleteForm($rcvl);
        $editForm = $this->createForm('ClubBundle\Form\RcvlType', $rcvl);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rcvl);
            $em->flush();

            return $this->redirectToRoute('rcvl_edit', array('id' => $rcvl->getId()));
        }

        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        return $this->render('ClubBundle:rcvl:edit.html.twig', array(
            'rcvl' => $rcvl,
            'clubs' => $clubs,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rcvl entity.
     *
     */
    public function deleteAction(Request $request, Rcvl $rcvl)
    {
        $form = $this->createDeleteForm($rcvl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rcvl);
            $em->flush();
        }

        return $this->redirectToRoute('rcvl_index');
    }

    /**
     * Creates a form to delete a Rcvl entity.
     *
     * @param Rcvl $rcvl The Rcvl entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rcvl $rcvl)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rcvl_delete', array('id' => $rcvl->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
