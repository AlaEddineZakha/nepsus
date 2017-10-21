<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryFormType;
use function PHPSTORM_META\type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/categories")
     */
    public function showAllAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories = $repository->findAll();


        return $this->render('produits/categories/list.html.twig', [
            'categories' => $categories,

        ]);

    }


    /**
     * @Route("/categories/new",name="addcategory")
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
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
}
