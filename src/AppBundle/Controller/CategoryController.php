<?php

namespace AppBundle\Controller;

use AppBundle\Form\CategoryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/categories")
     */
    public function showAllAction(Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories = $repository->findAll();



        return $this->render('produits/categories/show.html.twig', [
            'categories' => $categories,

        ]);

    }



    /**
     * @Route("/categories/new",name="addcategory")
     *
     */
    public function newAction(Request $request)
    {


        $form = $this->createForm(CategoryFormType::class);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('listclient');
        }
        return $this->render('produits/categories/new.html.twig', [
            'categoryForm' => $form->createView()
        ]);






    }
}
