<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\entrepot;
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
class EntrepotController extends Controller
{
    /**
     * @Route("/entrepots/new",name="addentrepot")
     *
     */
    public function newAction(Request $request)
    {


        if ($request->isMethod('POST')) {
            $entrepot = new entrepot();
            $entrepot->setNom($request->request->get('libele'));
            $entrepot->setType($request->request->get('type'));
            $entrepot->setCapacite($request->request->get('capacite'));
            $entrepot->setLocation($request->request->get('location'));
            $entrepot->setCreated(new \DateTime());



            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->flush();

            return $this->redirectToRoute('listentrepot');
        }


        return $this->render('Entrepots/add.html.twig');


    }
}
