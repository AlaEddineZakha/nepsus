<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 07/04/2017
 * Time: 16:46
 */

namespace AppBundle\Controller;



use AppBundle\Form\ClientFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends  Controller
{
    /**
     * @Route("/clients/new")
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
           // return $this->redirectToRoute('admin_genus_list');
        }
        return $this->render('clients/new.html.twig', [
            'clientForm' => $form->createView()
        ]);



    }
    /**
     * @Route("/clients")
     */
    public function showAction()
    {
        return new Response("Ceci est un test");
    }

}