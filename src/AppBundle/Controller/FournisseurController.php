<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Fournisseur;
use AppBundle\Form\FournisseurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ClientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FournisseurController extends Controller
{
    /**
     * @Route("/fournisseurs/new",name="addfournisseur")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(FournisseurFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $fournisseur = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);
            $em->flush();
            $this->addFlash(
                'notice',
                'Fournisseur ajouté'
            );



            return $this->redirectToRoute('listfournisseur');


        }
        return $this->render('fournisseurs/new.html.twig', [
            'fournisseurForm' => $form->createView()
        ]);



    }
    /**
     * @Route("/fournisseurs")
     */
    public function showAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM AppBundle:Fournisseur p');


        /** @var  $paginator \Knp\Component\Pager\Paginator */
        $paginator  = $this->get('knp_paginator');
        $result= $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('fournisseurs/show.html.twig', [
            'fournisseurs' => $result,

        ]);


    }

    /**
     * @Route("fournisseurs/{id}/edit", name="editfournisseur")
     */
    public function editAction(Fournisseur $fournisseur,Request $request)
    {
        $form = $this->createForm(FournisseurFormType::class,$fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fournisseur = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);
            $em->flush();
            $this->addFlash(
                'notice',
                'Fournisseur modifié'
            );



            return $this->redirectToRoute('listfournisseur');


        }
        return $this->render('fournisseurs/edit.html.twig', [
            'id'=>$fournisseur->getId(),
            'fournisseurForm' => $form->createView()
        ]);


        // ... do something, like pass the $product object into a template
    }

    /**
     *@Route("fournisseurs/{id}/delete", name="deletefournisseur")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fournisseur = $em->getRepository('AppBundle:Fournisseur')->find($id);
        $em->remove($fournisseur);
        $em->flush();
        return $this->redirectToRoute('listfournisseur');

    }
}
