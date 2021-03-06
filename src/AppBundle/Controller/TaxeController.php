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

            return $this->redirectToRoute('listtaxes');
        }


        return $this->render(':Taxes:add.html.twig');


    }

    /**
     * @Route("/taxes/{id}/edit",name="edittaxe")
     *
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $taxe =$em->getRepository('AppBundle:Taxe')->find($id);

        if ($request->isMethod('POST')) {



            $taxe->setCreated(new \DateTime());
            if (empty($request->request->get('active')))
            {
                $taxe->setActive('0');
            }
            else
            {
                $taxe->setActive('1');

            }


            $taxe->setMontant($request->request->get('taux'));




            $em = $this->getDoctrine()->getManager();
            $em->persist($taxe);
            $em->flush();

            return $this->redirectToRoute('listtaxes');
        }


        return $this->render(':Taxes:edit.html.twig', [
            'taxe' => $taxe

        ]);


    }

    /**
     * @Route("/taxes" , name="listetaxes")
     */
    public function showAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Taxe');
        $taxes = $repository->findAll();
        return $this->render('Taxes/list.html.twig', [
            'taxes' => $taxes

        ]);


    }

    /**
     * @Route("/taxes/{id}/delete", name="deletetaxe")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $taxe = $em->getRepository('AppBundle:Taxe')->find($id);

        $em->remove($taxe);


        $em->flush();
        return $this->redirectToRoute('listtaxes');

    }
}
