<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Produit;
use AppBundle\Entity\Taxe;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    public function fillproducttAction(Request $request)
    {

        $em = $this->get('doctrine')->getManager();
        $c= new Category();
        $c->setNom('TestCategory');
        $t= new Taxe();
        $t->setMontant(25);
        $t->setCreated((new \DateTime('+30 day')));
        $t->setActive(1);
        $c->setNom('TestCategory');
        $em->persist($c);
        $em->persist($t);
        for ($i=1;$i <=300;$i++) {

            $p = new Produit();
            $p->setEtat('En vente');
            $p->setCreated((new \DateTime('+30 day')));
            $p->setLibele('Produit test '.$i);
            $p->setDescription('test');
            $p->setCodedouane('A55f858a52');
            $p->setCategory($c);
            $p->setOrigine('France');
            $p->setType('Manifacturé');
            $p->setPrixvente(11);
            $p->setPrixachat(12);
            $p->setLimitestock(5);
            $p->setTva($t);

            $em->persist($p);

        }

        $em->flush();



        return $this->render(':dashboard:dashboard1.html.twig');




    }


}
