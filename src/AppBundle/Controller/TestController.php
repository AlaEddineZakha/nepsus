<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\FactureClient;
use AppBundle\Entity\Produit;
use AppBundle\Entity\Taxe;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class TestController extends Controller
{
    /**
     *@Route("/input", name="testrouteinput")
     */
    public function inputAction(Request $request)
    {



        return $this->render(':Testlayout:test.html.twig');
    }

    /**
     *@Route("/print", name="testrouteprint")
     */
    public function printAction(Request $request)
    {



            $name = $request->request->get('name');
            return $this->render(':Testlayout:editlayout.html.twig', [
                'name' => $name,
            ]);




    }


    public function notfoundAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
          $name = $request->attributes->get('path');


        return $this->render('404notfound.html.twig', [
            'name' => $name,
            'user'=>$user
        ]);




    }


    public function notallowedAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        return $this->render('pagenotallowed.html.twig', [
            'user'=>$user
        ]);

    }

    public function alreadyconfiguredAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        return $this->render('alreadyconfigured.html.twig', [
            'user'=>$user
        ]);

    }

    /**
     *@Route("/fill10kproducts", name="testproduct")
     */
    public function fillproducttAction()
    {
        $em = $this->getDoctrine()->getManager();
        $facture=$em->getRepository(FactureClient::class)->find(9);
        $snappy = $this->get('knp_snappy.pdf');

        $html = $this->renderView(':FacturesClients:viewraw.html.twig', array(
            'facture'=>$facture
        ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }








}
