<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Modules;
use AppBundle\Entity\Taxe;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class APIController extends Controller
{
    /**
     * @Route("/api/produits/{id}",name="getproductbyid")
     * @Method("GET")
     */
    public function JsonFindByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $products = $repository->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizer->setIgnoredAttributes(array('ligne','category','created','ligneFC','created'));



        $encoder = new JsonEncode();

        $serializer = new Serializer(array($normalizer), array($encoder));

        $jsonContent = $serializer->serialize($products, 'json');


        return new Response($jsonContent);

    }

    /**
     * @Route("/api/taxes",name="getalltaxes")
     * @Method("GET")
     */
    public function ApiGetAllTaxesdAction()
    {
        return new Response('Let\'s do this!');
    }
}


