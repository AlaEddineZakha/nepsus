<?php

namespace AppBundle\Controller;
use AppBundle\Entity\FactureClient;
use AppBundle\Entity\HistoriqueClient;
use AppBundle\Entity\LigneFC;
use AppBundle\Entity\LigneBCC;
use AppBundle\Entity\BonCommandeClient;
use AppBundle\Entity\Client;


use AppBundle\Entity\Category;
use AppBundle\Entity\ContactClient;
use AppBundle\Entity\Journal;

use AppBundle\Entity\Produit;
use AppBundle\Form\BonCommandeClientFormType;
use AppBundle\Form\ClientFormType;
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

class CommandeClientController extends Controller
{
    /**
     * @Route("/clients/commandes" ,name="listbcc")
     */
    public function showAllAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:BonCommandeClient');
        $commandes = $repository->findAll();
        return $this->render(':CommandeClient:show.html.twig', [
            'commandes' => $commandes,

        ]);
    }

    /*
     * @Route("/api/produits/{id}",name="getproductbyid" ,options={"expose"=true})
     * @Method("GET")

    public function JsonFindByIdAction($id)
    {

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $serializer = new Serializer(array($normalizer), array($encoder));
        $repository = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $products = $repository->find($id);



        $jsonContent = $serializer->serialize($products, 'json');



        $repository = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $products = $repository->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizer->setIgnoredAttributes(array('ligne','category','created','ligneFC','created'));

        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));

        $jsonContent = $serializer->serialize($products, 'json');

        return new Response($jsonContent);

    }
      */

    /**
     *@Route("clients/commandes/{id}/edit", name="editcommandec")
     */
    public function editCommandeAction($id,Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('AppBundle:BonCommandeClient')->find($id);
        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $produit = $repository2->getAll();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
        $client = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('AppBundle:Paiement\Devise');
        $devise = $repository->findAll();

        if ($request->isMethod('POST')) {

            $total=0;
            $totalht=0;
            $size = $request->request->get('size');
            $commandeclientliste = new ArrayCollection();



            $em = $this->get('doctrine')->getManager();

            $bc= new BonCommandeClient();
            $facture= new FactureClient();
            $historique = new HistoriqueClient();

            $repository = $this->getDoctrine()->getRepository('AppBundle:Client');
            $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
            $client = $repository->find($request->request->get('client'));

            for ($i=1;$i <=$size;$i++)
            {
                $total+=$request->request->get('prixttc-ligne'.$i);
                $totalht+=$request->request->get('prixht-ligne'.$i);
                $produit = $repository2->find($request->request->get('liste-ligne'.$i));

                $lc= new LigneBCC();
                $lfc= new LigneFC();





                $lc->setQuatity($request->request->get('qt-ligne'.$i));
                $lc->setTva($request->request->get('tva-ligne'.$i));
                $lc->setProduit($produit);
                $lc->setTotalht($request->request->get('prixht-ligne'.$i));
                $lc->setTotalttc($request->request->get('prixttc-ligne'.$i));
                $lc->setBc($bc);

                $em->persist($lc);



                $lfc->setQuatity($request->request->get('qt-ligne'.$i));
                $lfc->setTva($request->request->get('tva-ligne'.$i));
                $lfc->setProduit($produit);
                $lfc->setTotalht($request->request->get('prixht-ligne'.$i));
                $lfc->setTotalttc($request->request->get('prixttc-ligne'.$i));
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

            $bc->setClient($client);
            $commandeclientliste->add($bc);
            $client->setListecommandes($commandeclientliste);


            $bc->setTotalttc($request->request->get('totalttc'));
            $bc->setTotalht($request->request->get('totalht'));
            $bc->setCreated(new \DateTime());
            $bc->setDateecheance((new \DateTime('+30 day')));
            $bc->setStatut($request->request->get('statut'));
            $bc->addFacture($facture);



            $facture->setTotalttc($request->request->get('totalttc'));
            $facture->setTotalht($request->request->get('totalht'));
            $facture->setCreated(new \DateTime());
            $facture->setDateecheance((new \DateTime('+30 day')));
            $facture->setStatut('Impayée');
            $facture->setBc($bc);






            $historique->setClient($client);
            $historique->setTime(new \DateTime());
            $historique->setAction(" Nouvelle commande #".$bc->getId()." a été créé  ");
            $client->addHistorique($historique);



            $em->persist($bc);
            $em->persist($facture);
            $em->persist($client);
            $em->persist($historique);

            $em->flush();




            return $this->redirectToRoute('listbcc');

        }


        return $this->render(':CommandeClient:edit.html.twig', [
            'commande'=>$commande,
            'produit'=>$produit,
            'client'=>$client,
            'devise'=>$devise

        ]);

    }


}
