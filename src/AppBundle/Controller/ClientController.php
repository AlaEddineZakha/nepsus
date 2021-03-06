<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 07/04/2017
 * Time: 16:46
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Configuration;
use AppBundle\Entity\Devis\Devis;
use AppBundle\Entity\FactureClient;
use AppBundle\Entity\HistoriqueClient;
use AppBundle\Entity\LigneFC;
use AppBundle\Entity\LigneBCC;
use AppBundle\Entity\BonCommandeClient;
use AppBundle\Entity\Client;
use AppBundle\Entity\Paiement\Devise;
use AppBundle\Entity\Paiement\MethodeTransaction;
use AppBundle\Entity\Paiement\Transaction;
use AppBundle\Entity\Permission;
use AppBundle\Entity\RolePermission;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class ClientController extends  Controller
{
    /**
     * @Route("/clients/new",name="addclient")
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $idroleuser=$user->getRole();
        $permissions=$em->getRepository(Permission::class)->findOneBy(array('libele' => 'ajouterclient'));
        $idpermission=$permissions->getId();
        $currentrolepermission =$em->getRepository('AppBundle:RolePermission')->findBy(array('role' => $idroleuser,'permission'=>$idpermission));
        if ($currentrolepermission) {
            if ($request->isMethod('POST')) {
                $client = new Client();

                $client->setMatriculefiscale($request->request->get('mf'));
                $client->setRaison($request->request->get('raison'));
                $client->setEmail($request->request->get('email'));
                $client->setAdresse($request->request->get('adresse'));
                $client->setRegion($request->request->get('region'));
                $client->setVille($request->request->get('ville'));
                $client->setPays($request->request->get('pays'));
                $client->setTelephone($request->request->get('tel1'));
                $client->setMobile($request->request->get('tel2'));
                $client->setSiteweb($request->request->get('site'));
                $client->setRegistre($request->request->get('registre'));
                $client->setCreated(new \DateTime());
                $client->setFax($request->request->get('fax'));
                $client->setFormejuridique($request->request->get('formejuridique'));



                $em->persist($client);
                $em->flush();

                return $this->redirectToRoute('listclient');
            }


            return $this->render('clients/add.html.twig',[
                'user'=>$user
            ]);

        }
        else
        {
            return $this->redirectToRoute('pagenotallowed');
        }






    }

    /**
     * @Route("/clients" , name="listclient")
     */
    public function showAllAction(Request $request)
    {    //$route='listclient';
        //$route = $this->get('router')->getRouteCollection()->get('initconfig');
        //$object = $request->attributes->get('_route','initconfig');
        //$object=$this->get('router')->getRouteCollection()->get('initconfig');

        //$this->denyAccessUnlessGranted('ROLE_ADMIN', $route, 'Unable to access this page!');


        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $idroleuser=$user->getRole();
        $permissions=$em->getRepository(Permission::class)->findOneBy(array('libele' => 'voirclient'));
        $idpermission=$permissions->getId();
        $currentrolepermission =$em->getRepository('AppBundle:RolePermission')->findBy(array('role' => $idroleuser,'permission'=>$idpermission));
        if ($currentrolepermission)
        {
            $query = $em->createQuery('SELECT p FROM AppBundle:Client p');


            /** @var  $paginator \Knp\Component\Pager\Paginator */
            $paginator = $this->get('knp_paginator');
            $result = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5)
            );

            return $this->render(':clients:list.html.twig', [
                'clients' => $result,
                'user'=>$user

            ]);
        }
        else
        {
            return  $this->redirectToRoute('pagenotallowed');
        }





    }

    /**
     * @Route("/api/clients")
     * @Method("GET")
     */
    public function JsonshowAllAction()
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
        $products = $repository->findAll();

        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);

    }

    /**
     * @Route("/api/clients/{id}")
     * @Method("GET")
     */
    public function JsonFindByIdAction($id)
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
        $products = $repository->find($id);

        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);

    }

    /**
     * @Route("/api/clients/{id}/contacts")
     * @Method("GET")
     */
    public function JsonFindContactsByIdAction($id)
    {

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $em = $this->getDoctrine()->getManager();

        $serializer = new Serializer(array($normalizer), array($encoder));
        //$repository1 = $this->getDoctrine()->getRepository('AppBundle:Client');
        //$client = $repository1->find($id);


        $repository2 = $em->getRepository('AppBundle:ContactClient');
        $client = $repository2->getByClientId($id);


        //$categ = $serializer->serialize($client, 'json');


        $jsonContent = $serializer->serialize($client, 'json');
        return new Response($jsonContent);


    }

    /**
     * @Route("/api/categs")
     * @Method("GET")
     */
    public function JsonCategFindByIdAction()
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $products = $repository->findAll();

        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);

    }

    /**
     * @Route("/api/produits/categ/{idcateg}")
     * @Method("GET")
     */
    public function JsonProductsByCategIdAction($idcateg)
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $repository = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $products = $repository->getByCategId($idcateg);

        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);

    }

    /**
     * @Route("/checkemail/{email}")
     * @Method("GET")
     */
    public function CheckEmailAction($email)
    {


        $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
        $product = $repository->findOneBy(
            array('email' => $email)
        );
        if ($product) {
            return new Response(
                '<html><body>Exist</body></html>'
            );
        } else
            return new Response(
                '<html><body>Not exist</body></html>'
            );

    }


    /**
     * @Route("/api/categ/{idcateg}/produits")
     * @Method("GET")
     */
    public function JsonCategIdAction($idcateg)
    {

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();


        $serializer = new Serializer(array($normalizer), array($encoder));
        $repository1 = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories = $repository1->find($idcateg);


        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $produits = $repository2->getByCategId($idcateg);


        $categ = $serializer->serialize($categories, 'json');

        $prod = $serializer->serialize($produits, 'json');
        $data = ['categ' => $categ,
            'produits' => $prod

        ];


        return new JsonResponse($data);

    }

    /**
     * @Route("clients/{id}/edit", name="editclient")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('AppBundle:Client')->find($id);
        $user = $em->getRepository(User::class)->find($this->getUser()->getId());
        $idroleuser = $user->getRole();
        $permissions = $em->getRepository(Permission::class)->findOneBy(array('libele' => 'modifierclient'));
        $idpermission = $permissions->getId();
        $commandesclients = $em->getRepository(BonCommandeClient::class)->findBy(array('client' => $client));
        $transactions = $em->getRepository(Transaction::class)->findBy(array('client' => $client));
        $currentrolepermission = $em->getRepository('AppBundle:RolePermission')->findBy(array('role' => $idroleuser, 'permission' => $idpermission));
        if ($currentrolepermission) {


            if ($request->isMethod('POST')) {


                $client->setMatriculefiscale($request->request->get('mf'));
                $client->setRaison($request->request->get('raison'));
                $client->setEmail($request->request->get('email'));
                $client->setAdresse($request->request->get('adresse'));
                $client->setRegion($request->request->get('region'));
                $client->setVille($request->request->get('ville'));
                $client->setPays($request->request->get('pays'));
                $client->setTelephone($request->request->get('tel1'));
                $client->setMobile($request->request->get('tel2'));
                $client->setSiteweb($request->request->get('site'));
                $client->setRegistre($request->request->get('registre'));
                $client->setCreated(new \DateTime());
                $client->setFax($request->request->get('fax'));
                $client->setFormejuridique($request->request->get('formejuridique'));


                $em = $this->getDoctrine()->getManager();
                $em->persist($client);
                $em->flush();

                return $this->redirectToRoute('listclient');
            }

            return $this->render('clients/edit.html.twig', [
                'client' => $client,
                'user' => $user,
                'commandesclients'=>$commandesclients,
                'transactions'=>$transactions,

            ]);


            // ... do something, like pass the $product object into a template
        }
        else
        {
            return $this->redirectToRoute('pagenotallowed');
        }
    }

    /**
     * @Route("clients/{id}/delete", name="deleteclient")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('AppBundle:Client')->find($id);

        $em->remove($client);


        $em->flush();
        return $this->redirectToRoute('listclient');

    }


    /**
     * @Route("commandes/add", name="addcommandec")
     */
    public function addCommandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
        $client = $repository->findAll();
        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $produit = $repository2->getAll();

        $methodespaiement=$em->getRepository(MethodeTransaction::class)->findAll();
        $devises=$em->getRepository(Devise::class)->findAll();
        try {

            if ($request->isMethod('POST')) {
                $total = 0;
                $totalht = 0;
                $size = $request->request->get('size');
                $commandeclientliste = new ArrayCollection();


                $em = $this->get('doctrine')->getManager();

                $bc = new BonCommandeClient();
                $facture = new FactureClient();
                $historique = new HistoriqueClient();


                $repository = $this->getDoctrine()->getRepository('AppBundle:Client');

                $client = $repository->find($request->request->get('client'));

                for ($i = 1; $i <= $size; $i++) {
                    $total += $request->request->get('prixttc-ligne' . $i);
                    $totalht += $request->request->get('prixht-ligne' . $i);
                    $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
                    $produit = $repository2->find($request->request->get('liste-ligne' . $i));



                    $lc = new LigneBCC();
                    $lfc = new LigneFC();


                    $lc->setQuatity($request->request->get('qt-ligne' . $i));
                    $lc->setTva($request->request->get('tva-ligne' . $i));
                    $lc->setProduit($produit);
                    $lc->setTotalht($request->request->get('prixht-ligne' . $i));
                    $lc->setTotalttc($request->request->get('prixttc-ligne' . $i));
                    $lc->setBc($bc);

                    $em->persist($lc);


                    $lfc->setQuatity($request->request->get('qt-ligne' . $i));
                    $lfc->setTva($request->request->get('tva-ligne' . $i));
                    $lfc->setProduit($produit);
                    $lfc->setTotalht($request->request->get('prixht-ligne' . $i));
                    $lfc->setTotalttc($request->request->get('prixttc-ligne' . $i));
                    $lfc->setFacture($facture);

                    $em->persist($lfc);


                    $produit->addLigne($lc);
                    $produit->addLigneFC($lfc);
                    $facture->addLignefc($lfc);
                    $bc->addLigne($lc);


                    $em->persist($produit);
                    $em->persist($bc);
                    $em->persist($facture);


                }
                $config = $em->getRepository(Configuration::class)->find(1);
                $bc->setClient($client);
                $commandeclientliste->add($bc);
                $client->setListecommandes($commandeclientliste);


                $bc->setTotalttc($request->request->get('totalttc'));
                $bc->setTotalht($request->request->get('totalht'));
                $bc->setCreated(new \DateTime());
                $bc->setDateecheance((new \DateTime('+30 day')));
                $bc->setStatut($request->request->get('statut'));
                $bc->setFacture($facture);


                $facture->setTotalttc($request->request->get('totalttc'));
                $facture->setTotalht($request->request->get('totalht'));
                $facture->setCreated(new \DateTime());
                if ($config->getEchancefacture()==1)
                {
                    $facture->setDateecheance((new \DateTime('+30 day')));
                }

                if ($config->getEchancefacture()==2)
                {
                    $facture->setDateecheance((new \DateTime('+60 day')));
                }
                if ($config->getEchancefacture()==3)
                {
                    $facture->setDateecheance((new \DateTime('+90 day')));
                }

                $facture->setStatut('Impayée');
                $facture->setBc($bc);


                $historique->setClient($client);
                $historique->setTime(new \DateTime());
                $historique->setAction(" Nouvelle commande #" . $bc->getId() . " a été créé  ");
                $client->addHistorique($historique);


                $em->persist($bc);
                $em->persist($facture);
                $em->persist($client);
                $em->persist($historique);
                $transaction = new Transaction();
                $transaction->setMontant($request->request->get('totalttc'));
                $transaction->setEtat($facture->getStatut());
                $devise=$em->getRepository(Devise::class)->find($request->request->get('devise'));
                $methode=$em->getRepository(MethodeTransaction::class)->find($request->request->get('methode'));
                $transaction->setDevise($devise);
                $transaction->setMethodetransaction($methode);
                $transaction->setFacture($facture);
                $transaction->setClient($client);
                $em->persist($transaction);
                $client->addTransaction($transaction);
                 $em->persist($client);

                $em->flush();

                if ($config->getNotificationcommande()==1)
                {
                    $em = $this->getDoctrine()->getManager();
                    $facturesend=$em->getRepository(FactureClient::class)->find($facture->getId());
                    $snappy = $this->get('knp_snappy.pdf');

                    $html = $this->renderView(':FacturesClients:viewraw.html.twig', array(
                        'facture'=>$facturesend
                    ));

                    $filename = $client->getRaison().'_Facture '.$facture->getId();

                    $attachment = new \Swift_Attachment($snappy->getOutputFromHtml($html), $filename.'.pdf', 'application/pdf');

                    $message = (new \Swift_Message(" Nepsus : nouvelle notification de commande #" . $bc->getId() . " a été créé  "))
                        ->setFrom('achref.tlija@gmail.com')
                        ->setTo($client->getEmail())
                        ->attach($attachment)
                        ->setBody($this->renderView(

                            ':Testlayout:emailtemplate.html.twig', [
                                'facture' => $facture]
                        ),
                            'text/html'
                        );

                    $this->get('mailer')->send($message);
                }



                return $this->redirectToRoute('listfacturesclients');

            }

        }
        catch (\Exception $e) {

            return new Response(
                "Error ! : ".$e->getMessage()
            );
        }




        return $this->render(':CommandeClient:new1.html.twig', [
            'client' => $client,
            'produit' => $produit,
            'devise' => $devises,
            'methodespaiement' => $methodespaiement

        ]);


    }
}