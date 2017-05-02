<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 07/04/2017
 * Time: 16:46
 */

namespace AppBundle\Controller;



use AppBundle\Entity\Client;
use AppBundle\Form\ClientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends  Controller
{
    /**
     * @Route("/clients/new",name="addclient")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(ClientFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $client = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash(
                'notice',
                'Client ajouté'
            );



            return $this->redirectToRoute('listclient');


        }
        return $this->render('clients/new.html.twig', [
            'clientForm' => $form->createView()
        ]);



    }
    /**
     * @Route("/clients")
     */
    public function showAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM AppBundle:Client p');


        /** @var  $paginator \Knp\Component\Pager\Paginator */
        $paginator  = $this->get('knp_paginator');
        $result= $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('clients/show.html.twig', [
            'clients' => $result,

        ]);


    }

    /**
     * @Route("clients/{id}/edit", name="editclient")
     */
    public function editAction(Client $client,Request $request)
    {
        $form = $this->createForm(ClientFormType::class,$client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $client = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash(
                'notice',
                'Client modifié'
            );



            return $this->redirectToRoute('listclient');


        }
        return $this->render('clients/edit.html.twig', [
            'id'=>$client->getId(),
            'clientForm' => $form->createView()
        ]);


        // ... do something, like pass the $product object into a template
    }

    /**
     *@Route("clients/{id}/delete", name="deleteclient")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('AppBundle:Client')->find($id);
        $em->remove($client);
        $em->flush();
        return $this->redirectToRoute('listclient');

    }

}