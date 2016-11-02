<?php

namespace ClubBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\PageMembre;
use ClubBundle\Form\PageMembreType;
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

        return $this->render('ClubBundle:pagemembre:index.html.twig', array(
            'pageMembres' => $pageMembres,
            'clubs' => $clubs,
            'membres' => $membres,
        ));
    }

    /**
     * Displays a form to edit an existing PageMembre entity.
     *
     */
    public function editAction(Request $request, PageMembre $pageMembre)
    {
        /*$deleteForm = $this->createDeleteForm($membre);*/

        /* Formulaire Edition de la Page Membre */
        $editForm = $this->createForm('ClubBundle\Form\PageMembreType', $pageMembre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pageMembre);
            $em->flush();

            return $this->redirectToRoute('pagemembre_edit', array('id' => $pageMembre->getId()));
        }

        /* Récupération des données de l'entité Membres pour afficher les membres */
        $mEm = $this->getDoctrine()->getManager();
        $membres = $mEm->getRepository('ClubBundle:Membres')->findAll();

        /* Formulaire Nouveau Membre */
        $membre = new Membres();
        $newForm = $this->createForm('ClubBundle\Form\MembresType', $membre);
        $newForm->handleRequest($request);

        if ($newForm->isSubmitted() && $newForm->isValid()) {
            $mEm = $this->getDoctrine()->getManager();
            $mEm->persist($membre);
            $mEm->flush();

            return $this->redirectToRoute('pagemembre_edit', array('id' => $pageMembre->getId()));
        }

        /* Récupération des données de l'entité Club pour afficher la barre de navigation */
        $clubEm = $this->getDoctrine()->getManager();
        $clubs = $clubEm->getRepository('ClubBundle:Club')->findAll();

        /* Formulaire Edition des Membres (NON-FONCTIONNEL)
        foreach ($membres as $membre) {
            $editFormMembre = $this->createForm('ClubBundle\Form\MembresType', $membre);
            $editFormMembre->handleRequest($request);

            if ($editFormMembre->isSubmitted() && $editFormMembre->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($membre);
                $em->flush();

                return $this->redirectToRoute('pagemembre_edit', array('id' => $pageMembre->getId()));
            }
            return $this->render('ClubBundle:PageMembre:edit.html.twig', array(
                'edit_form_membre' => $editFormMembre->createView(),
            ));
        }*/
        return $this->render('ClubBundle:pagemembre:edit.html.twig', array(
            'pageMembre' => $pageMembre,
            'membre' => $membre,
            'clubs' => $clubs,
            'membres' => $membres,
            'edit_form' => $editForm->createView(),
            'newForm' => $newForm->createView(),
            /*'delete_form' => $deleteForm->createView(),*/
        ));

    }

    /**
     * Deletes a PageMembre entity.
     *
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
    }*/

    /**
     * Creates a form to delete a PageMembre entity.
     *
     * @param PageMembre $pageMembre The PageMembre entity
     *
     * @return \Symfony\Component\Form\Form The form

    private function createDeleteForm(PageMembre $pageMembre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pagemembre_delete', array('id' => $pageMembre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }*/

    /**
     * Deletes a Membres entity.
     *

    public function deleteAction(Request $request, PageMembre $pageMembre, Membres $membre)
    {
        $form = $this->createDeleteForm($membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membre);
            $em->flush();
        }

        return $this->redirectToRoute('pagemembre_edit', array('id' => $pageMembre->getId()));
    }*/

    /**
     * Creates a form to delete a Membres entity.
     *
     * @param Membres $membre The Membres entity
     *
     * @return \Symfony\Component\Form\Form The form

    private function createDeleteForm(Membres $membre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membres_delete', array('id' => $membre->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }*/


}
