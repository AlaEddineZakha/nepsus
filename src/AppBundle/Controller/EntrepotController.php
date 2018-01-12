<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Entrepot;
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
            $entrepot->setEspacerestant(0);
            $entrepot->setEspacerempli(0);
            $entrepot->setCreated(new \DateTime());



            $em = $this->getDoctrine()->getManager();
            $em->persist($entrepot);
            $em->flush();

            return $this->redirectToRoute('listentrepots');
        }


        return $this->render('Entrepots/add.html.twig');


    }



    /**
     * @Route("/entrepots" , name="listentrepots")
     */
    public function showAllAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Entrepot');
        $entrepots = $repository->findAll();
        return $this->render('Entrepots/list.html.twig', [
            'entrepots' => $entrepots,

        ]);


    }

    /**
     * @Route("entrepots/{id}/edit", name="editentrepot")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entrepot = $em->getRepository('AppBundle:Entrepot')->find($id);
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

            return $this->redirectToRoute('listentrepots');
        }

        return $this->render('Entrepots/edit.html.twig', [
            'entrepot' => $entrepot

        ]);


        // ... do something, like pass the $product object into a template
    }

    /**
     * @Route("entrepots/{id}/delete", name="deleteentrepot")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entrepot = $em->getRepository('AppBundle:Entrepot')->find($id);

        $em->remove($entrepot);


        $em->flush();
        return $this->redirectToRoute('listentrepots');

    }
}
