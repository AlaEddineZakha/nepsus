<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProduitFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Produit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProduitController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    /**
     *@Route("produits/nouveau", name="ajouterproduit")
     */
    public function newProduitAction(Request $request)
    {
        $form = $this->createForm(ProduitFormType::class);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $produit = $form->getData();
            $idtaxe=$form->get('tva')->getData();
            $repository1 = $this->getDoctrine()->getRepository('AppBundle:Taxe');
            $taxe = $repository1->find(1);


            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $taxe->addProduits($produit);
            $em->persist($taxe);

            $em->flush();

            return $this->redirectToRoute('listproduits');
        }
        return $this->render('produits/new.html.twig', [
            'produitForm' => $form->createView()
        ]);

    }

    /**
     * @Route("/produits" , name="listproduits")
     */
    public function showAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM AppBundle:Produit p');


        /** @var  $paginator \Knp\Component\Pager\Paginator */
        $paginator  = $this->get('knp_paginator');
        $result= $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('produits/show.html.twig', [
            'produits' => $result,

        ]);


    }
}
