<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BonCommandeFournisseur;
use AppBundle\Entity\FactureFournisseur;
use AppBundle\Entity\HistoriqueFournisseur;
use AppBundle\Entity\LigneBCF;
use AppBundle\Entity\LigneFF;
use AppBundle\Entity\Lot;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;

class CommandeFournisseurController extends Controller
{

    /**
     * @Route("fournisseurs/commandes/add", name="addcommandef")
     */
    public function addCommandeAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Fournisseur');
        $fournisseur = $repository->findAll();
        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
        $produit = $repository2->findAll();
        $repository3 = $this->getDoctrine()->getRepository('AppBundle:Entrepot');
        $entrepots = $repository3->findAll();
        $repository4 = $this->getDoctrine()->getRepository('AppBundle:Paiement\Devise');
        $devise = $repository4->findAll();
        try {

            if ($request->isMethod('POST')) {
                $total = 0;
                $totalht = 0;
                $size = $request->request->get('size');
                $commandeclientliste = new ArrayCollection();


                $em = $this->get('doctrine')->getManager();

                $bc = new BonCommandeFournisseur();
                $facture = new FactureFournisseur();
                $historique = new HistoriqueFournisseur();

                $repository = $this->getDoctrine()->getRepository('AppBundle:Fournisseur');

                $fournisseur = $repository->find($request->request->get('fournisseur'));
                $qtproduit=0;

                for ($i = 1; $i <= $size; $i++) {
                    $total += $request->request->get('prixttc-ligne' . $i);
                    $totalht += $request->request->get('prixht-ligne' . $i);
                    $repository2 = $this->getDoctrine()->getRepository('AppBundle:Produit');
                    $produit = $repository2->find($request->request->get('liste-ligne' . $i));



                    $lc = new LigneBCF();
                    $lfc = new LigneFF();


                    $lc->setQuatity($request->request->get('qt-ligne' . $i));
                    $qtproduit+=$request->request->get('qt-ligne' . $i);
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


                    $produit->addLigneBCF($lc);
                    $produit->addLigneFF($lfc);
                    $facture->addLigneFF($lfc);
                    $bc->addLigne($lc);


                    $em->persist($produit);
                    $em->persist($bc);
                    $em->persist($facture);


                }




                $bc->setFournisseur($fournisseur);
                $commandeclientliste->add($bc);
                $fournisseur->setListecommandes($commandeclientliste);


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


                $historique->setFournisseur($fournisseur);
                $historique->setTime(new \DateTime());
                $historique->setAction(" Nouvelle commande #" . $bc->getId() . " a été créé  ");
                $fournisseur->addHistorique($historique);



                $lot= new Lot();
                $lot->setEntrepot(null);
                $lot->setEtat('En attente');
                $lot->setNbproduits($qtproduit);
                $lot->setCommandefournisseur($bc);
                $lot->setCreated(new \DateTime());
                $lot->setPrix($request->request->get('totalttc'));
                $em->persist($lot);

                $bc->setLot($lot);
                $em->persist($bc);
                $em->persist($facture);
                $em->persist($fournisseur);
                $em->persist($historique);


                $em->flush();

                return $this->redirectToRoute('confirmlot', array('id' => $bc->getId() ));

            }

        }
        catch (\Exception $e) {

            return new Response(
                "Error ! : ".$e->getMessage()
            );
        }




        return $this->render(':CommandeFournisseur:new1.html.twig', [
            'fournisseur' => $fournisseur,
            'produit' => $produit,
            'devise' => $devise,
            'entrepots' => $entrepots

        ]);


    }




    /**
     * @Route("/fournisseurs/commandes" ,name="listbcf")
     */
    public function showAllAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:BonCommandeFournisseur');
        $commandes = $repository->findAll();
        return $this->render(':CommandeFournisseur:show.html.twig', [
            'commandes' => $commandes,

        ]);
    }
}
