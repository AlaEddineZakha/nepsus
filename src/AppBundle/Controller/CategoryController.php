<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Modules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/categories" ,name="listcategories")
     */
    public function showAllAction()
    {   $em = $this->getDoctrine()->getManager();
        $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));

        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories = $repository->findAll();

        if ($modulecategories->getActive()==true)
        {
            return $this->render('produits/categories/show.html.twig', [
                'categories' => $categories

            ]);

        }

        return $this->redirectToRoute('pagenotallowed');

    }


    /**
     * @Route("/categories/new", name="addcategorie")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
       // $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));
        $repository=$em->getRepository('AppBundle:Category');
        $parents=$repository->findAll();
        if ($request->isMethod('POST')) {

            $categorie = new Category();
            $categorie->setNom($request->request->get('nom'));

            if ( empty($request->request->get('parent')))
            {
                $categorie->setParent(null);
                $categorie->setDepth(1);

            }
            else
            {
                $parent=$repository->find($request->request->get('parent'));
                $categorie->setParent($parent);
                $categorie->setDepth($parent->getDepth()+1);

            }

            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('app_category_showall');


        }
        return $this->render('produits/categories/add.html.twig', [
            'parents' => $parents,

        ]);
    }

    /**
     * @Route("categories/{id}/delete", name="deletecategorie")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('AppBundle:Category')->find($id);

        $em->remove($categorie);


        $em->flush();
        return $this->redirectToRoute('listcategories');

    }

    /**
     * @Route("categories/{id}/edit", name="editcategorie")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie =$em->getRepository('AppBundle:Category')->find($id);

        $parents=$em->getRepository('AppBundle:Category')->findAll();
        $repository=$em->getRepository('AppBundle:Category');
        if ($request->isMethod('POST')) {


            $categorie->setNom($request->request->get('nom'));

            if ( empty($request->request->get('parent')))
            {
                $categorie->setParent(null);
                $categorie->setDepth(1);

            }
            else
            {
                $parent=$repository->find($request->request->get('parent'));
                $categorie->setParent($parent);
                $categorie->setDepth($parent->getDepth()+1);

            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('app_category_showall');


        }

        return $this->render('produits/categories/edit.html.twig', [
            'categorie' => $categorie,
            'parents'=>$parents


        ]);


        // ... do something, like pass the $product object into a template
    }
}
