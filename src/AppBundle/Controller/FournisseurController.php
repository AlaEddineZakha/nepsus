<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Fournisseur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FournisseurController extends Controller
{

    /**
     * @Route("/fournisseurs/add",name="addfournisseur")
     *
     */
    public function newAction(Request $request)
    {


        if ($request->isMethod('POST')) {
            $fournisseur= new Fournisseur();
            $fournisseur->setCapital($request->request->get('cap'));
            $fournisseur->setMatriculefiscale($request->request->get('mf'));
            $fournisseur->setRaison($request->request->get('raison'));
            $fournisseur->setEmail($request->request->get('email'));
            $fournisseur->setAdresse($request->request->get('adresse'));
            $fournisseur->setRegion($request->request->get('region'));
            $fournisseur->setVille($request->request->get('ville'));
            $fournisseur->setPays($request->request->get('pays'));
            $fournisseur->setTelephone($request->request->get('tel1'));
            $fournisseur->setMobile($request->request->get('tel2'));
            $fournisseur->setSiteweb($request->request->get('site'));
            $fournisseur->setRegistre($request->request->get('registre'));
            $fournisseur->setCreated(new \DateTime());
            $fournisseur->setFax($request->request->get('fax'));
            $fournisseur->setFormejuridique($request->request->get('formejuridique'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);
            $em->flush();

            return $this->redirectToRoute('listfournisseur');
        }


        return $this->render('fournisseurs/add.html.twig');



    }

    /**
     * @Route("fournisseurs/{id}/edit", name="editfournisseur")
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $fournisseur = $em->getRepository('AppBundle:Fournisseur')->find($id);

        if ($request->isMethod('POST')) {

            $fournisseur->setCapital($request->request->get('cap'));
            $fournisseur->setMatriculefiscale($request->request->get('mf'));
            $fournisseur->setRaison($request->request->get('raison'));
            $fournisseur->setEmail($request->request->get('email'));
            $fournisseur->setAdresse($request->request->get('adresse'));
            $fournisseur->setRegion($request->request->get('region'));
            $fournisseur->setVille($request->request->get('ville'));
            $fournisseur->setPays($request->request->get('pays'));
            $fournisseur->setTelephone($request->request->get('tel1'));
            $fournisseur->setMobile($request->request->get('tel2'));
            $fournisseur->setSiteweb($request->request->get('site'));
            $fournisseur->setRegistre($request->request->get('registre'));
            $fournisseur->setCreated(new \DateTime());
            $fournisseur->setFax($request->request->get('fax'));
            $fournisseur->setFormejuridique($request->request->get('formejuridique'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);
            $em->flush();

            return $this->redirectToRoute('listfournisseur');
        }

        return $this->render('fournisseurs/edit.html.twig', [
            'fournisseur'=>$fournisseur

        ]);


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


    /**
     * @Route("fournisseur" , name="listfournisseur")
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
        return $this->render(':fournisseurs:list.html.twig', [
            'fournisseurs' => $result,

        ]);


    }

}
