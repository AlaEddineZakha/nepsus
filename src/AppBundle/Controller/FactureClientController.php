<?php

namespace AppBundle\Controller;


use AppBundle\Entity\FactureClient;
use AppBundle\Entity\HistoriqueClient;
use AppBundle\Entity\LigneFC;
use AppBundle\Entity\Paiement\Transaction;
use Symfony\Component\HttpFoundation\AcceptHeader;
use AppBundle\Entity\BonCommandeClient;
use AppBundle\Entity\Client;
use AppBundle\Entity\Category;
use AppBundle\Entity\ContactClient;
use AppBundle\Entity\Journal;
use AppBundle\Entity\LigneBCC;
use AppBundle\Entity\Produit;
use AppBundle\Form\BCitemsFormType;
use AppBundle\Form\BonCommandeClientFormType;
use AppBundle\Form\ClientFormType;
use AppBundle\Repository\ProduitRepository;
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

class FactureClientController extends Controller
{
    /**
     * @Route("/facturesclients" , name="listfacturesclients")
     */
    public function showAllAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:FactureClient');
        $factures = $repository->findAll();
        return $this->render(':FacturesClients:list.html.twig', [
            'factures' => $factures,

        ]);
    }



    /**
     * @Route("factures/{id}/view", name="viewfactureclient")
     */
    public function viewAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('AppBundle:FactureClient')->find($id);


        return $this->render(':FacturesClients:view.html.twig', [
            'facture'=>$facture

        ]);


        // ... do something, like pass the $product object into a template
    }



    public function payerAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('AppBundle:FactureClient')->find($id);
        $bc = $em->getRepository('AppBundle:BonCommandeClient')->find($facture->getBc());
        $paiement=new Transaction();
        $paiement->setMontant($facture->getTotalttc());
        $paiement->setEtat('Terminé');
        $paiement->setNote('Facture #'.$facture->getId().' payée avec succes');
        $paiement->setFacture($facture);
        $paiement->setDatepaiement(new \DateTime());
        $facture->addPaiement($paiement);
        $facture->setStatut('Payée');
        $em->persist($facture);
        $em->persist($paiement);

        $bc->setStatut('En cours de traitement');
        $em->persist($bc);

        $em->flush();

        return $this->render(':FacturesClients:view.html.twig', [
            'facture'=>$facture

        ]);


        // ... do something, like pass the $product object into a template
    }

    public function impayerAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('AppBundle:FactureClient')->find($id);
        $bc = $em->getRepository('AppBundle:BonCommandeClient')->find($facture->getBc());
        $paiement=new Transaction();
        $paiement->setMontant($facture->getTotalttc());
        $paiement->setEtat('En attente');
        $paiement->setNote('Facture #'.$facture->getId().' à été marque comme impayée');
        $paiement->setFacture($facture);
        $paiement->setDatepaiement(new \DateTime());
        $facture->addPaiement($paiement);
        $facture->setStatut('Impayée');
        $em->persist($facture);
        $em->persist($paiement);

        $bc->setStatut('En attente');
        $em->persist($bc);

        $em->flush();

        return $this->render(':FacturesClients:view.html.twig', [
            'facture'=>$facture

        ]);


        // ... do something, like pass the $product object into a template
    }

    public function annulerAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('AppBundle:FactureClient')->find($id);
        $bc = $em->getRepository('AppBundle:BonCommandeClient')->find($facture->getBc());
        $paiement=new Transaction();
        $paiement->setMontant($facture->getTotalttc());
        $paiement->setEtat('Annulé');
        $paiement->setNote('Facture #'.$facture->getId().' à été marque comme annulé');
        $paiement->setFacture($facture);
        $paiement->setDatepaiement(new \DateTime());
        $facture->addPaiement($paiement);
        $facture->setStatut('Annulé');
        $em->persist($facture);
        $em->persist($paiement);

        $bc->setStatut('Annulé');
        $em->persist($bc);

        $em->flush();

        return $this->render(':FacturesClients:view.html.twig', [
            'facture'=>$facture

        ]);


        // ... do something, like pass the $product object into a template
    }
}
