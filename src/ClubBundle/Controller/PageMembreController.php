<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\PageMembre;
use ClubBundle\Form\PageMembreType;
use ClubBundle\Entity\Club;
use ClubBundle\Entity\Membres;
use ClubBundle\Form\MembresType;


/**
 * PageMembre controller.
 *
 */
class PageMembreController extends Controller
{
    /**
     * Lists all PageMembre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pageMembres = $em->getRepository('ClubBundle:PageMembre')->findAll();
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        $Mem = $this->getDoctrine()->getManager();
        $membres = $Mem->getRepository('ClubBundle:Membres')->findAll();

        return $this->render('ClubBundle:PageMembre:index.html.twig', array(
            'pageMembres' => $pageMembres,
            'clubs' => $clubs,
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
     * Finds and displays a PageMembre entity.
     *
     */
    public function showAction(PageMembre $pageMembre)
    {
        $deleteForm = $this->createDeleteForm($pageMembre);

        return $this->render('ClubBundle:PageMembre:show.html.twig', array(
            'pageMembre' => $pageMembre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PageMembre entity.
     *
     */
    public function editAction(Request $request, PageMembre $pageMembre)
    {
        $deleteForm = $this->createDeleteForm($pageMembre);
        $editForm = $this->createForm('ClubBundle\Form\PageMembreType', $pageMembre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pageMembre);
            $em->flush();

            return $this->redirectToRoute('pagemembre_edit', array('id' => $pageMembre->getId()));
        }
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();
        $Mem = $this->getDoctrine()->getManager();
        $membres = $Mem->getRepository('ClubBundle:Membres')->findAll();
        return $this->render('ClubBundle:PageMembre:edit.html.twig', array(
            'pageMembre' => $pageMembre,
            'clubs' => $clubs,
            'membres' => $membres,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PageMembre entity.
     *
     */
    public function deleteAction(Request $request, PageMembre $pageMembre)
    {
        $form = $this->createDeleteForm($pageMembre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pageMembre);
            $em->flush();
        }

        return $this->redirectToRoute('pagemembre_index');
    }

    /**
     * Creates a form to delete a PageMembre entity.
     *
     * @param PageMembre $pageMembre The PageMembre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PageMembre $pageMembre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pagemembre_delete', array('id' => $pageMembre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
