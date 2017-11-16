<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taxe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class TaxeController extends Controller
{
    /**
     * @Route("/taxes/new",name="addtaxe")
     *
     */
    public function newAction(Request $request)
    {


        if ($request->isMethod('POST')) {
            $taxe = new Taxe();


            $taxe->setCreated(new \DateTime());
            if (empty($request->request->get('active')))
            {
                $taxe->setActive('off');
            }
            else
            {
                $taxe->setActive($request->request->get('active'));

            }


            $taxe->setMontant($request->request->get('taux'));




            $em = $this->getDoctrine()->getManager();
            $em->persist($taxe);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }


        return $this->render(':Taxes:add.html.twig');


    }
}
