<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\Ara;
use ClubBundle\Form\AraType;

/**
 * Ara controller.
 *
 */
class AraController extends Controller
{
    /**
     * Lists all Ara entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aras = $em->getRepository('ClubBundle:Ara')->findAll();

        return $this->render('ClubBundle:ara:index.html.twig', array(
            'aras' => $aras,
        ));
    }

    /**
     * Creates a new Ara entity.
     *
     */
    public function newAction(Request $request)
    {
        $ara = new Ara();
        $form = $this->createForm('ClubBundle\Form\AraType', $ara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ara);
            $em->flush();

            return $this->redirectToRoute('ara_show', array('id' => $ara->getId()));
        }

        return $this->render('ClubBundle:ara:new.html.twig', array(
            'ara' => $ara,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ara entity.
     *
     */
    public function showAction(Ara $ara)
    {
        $deleteForm = $this->createDeleteForm($ara);

        return $this->render('ClubBundle:ara:show.html.twig', array(
            'ara' => $ara,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ara entity.
     *
     */
    public function editAction(Request $request, Ara $ara)
    {
        $deleteForm = $this->createDeleteForm($ara);
        $editForm = $this->createForm('ClubBundle\Form\AraType', $ara);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ara);
            $em->flush();

            return $this->redirectToRoute('ara_edit', array('id' => $ara->getId()));
        }

        return $this->render('ClubBundle:ara:edit.html.twig', array(
            'ara' => $ara,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ara entity.
     *
     */
    public function deleteAction(Request $request, Ara $ara)
    {
        $form = $this->createDeleteForm($ara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ara);
            $em->flush();
        }

        return $this->redirectToRoute('ara_index');
    }

    /**
     * Creates a form to delete a Ara entity.
     *
     * @param Ara $ara The Ara entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ara $ara)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ara_delete', array('id' => $ara->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
