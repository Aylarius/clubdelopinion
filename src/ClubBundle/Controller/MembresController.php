<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\Membres;
use ClubBundle\Form\MembresType;

/**
 * Membres controller.
 *
 */
class MembresController extends Controller
{
    /**
     * Lists all Membres entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository('ClubBundle:Membres')->findAll();

        return $this->render('ClubBundle:Membres:index.html.twig', array(
            'membres' => $membres,
        ));
    }

    /**
     * Creates a new Membres entity.
     *
     */
    public function newAction(Request $request)
    {
        $membre = new Membres();
        $form = $this->createForm('ClubBundle\Form\MembresType', $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            return $this->redirectToRoute('membres_show', array('id' => $membre->getId()));
        }

        return $this->render('ClubBundle:Membres:new.html.twig', array(
            'membre' => $membre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Membres entity.
     *
     */
    public function showAction(Membres $membre)
    {
        $deleteForm = $this->createDeleteForm($membre);

        return $this->render('ClubBundle:Membres:show.html.twig', array(
            'membre' => $membre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Membres entity.
     *
     */
    public function editAction(Request $request, Membres $membre)
    {
        $deleteForm = $this->createDeleteForm($membre);
        $editForm = $this->createForm('ClubBundle\Form\MembresType', $membre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            return $this->redirectToRoute('membres_edit', array('id' => $membre->getId()));
        }

        return $this->render('ClubBundle:Membres:edit.html.twig', array(
            'membre' => $membre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Membres entity.
     *
     */
    public function deleteAction(Request $request, Membres $membre)
    {
        $form = $this->createDeleteForm($membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membre);
            $em->flush();
        }

        return $this->redirectToRoute('membres_index');
    }

    /**
     * Creates a form to delete a Membres entity.
     *
     * @param Membres $membre The Membres entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Membres $membre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membres_delete', array('id' => $membre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
