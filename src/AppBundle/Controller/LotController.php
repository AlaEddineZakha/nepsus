<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BonCommandeFournisseur;
use AppBundle\Entity\Entrepot;
use AppBundle\Entity\FactureFournisseur;
use AppBundle\Entity\HistoriqueFournisseur;
use AppBundle\Entity\LigneBCF;
use AppBundle\Entity\LigneFF;
use AppBundle\Entity\Lot;
use AppBundle\Repository\EntrepotRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;

class LotController extends Controller
{
    /**
     * @Route("/fournisseurs/commandes/{id}/lot/confirm" ,name="confirmlot")
     */
    public function indexAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $commande=$em->getRepository(BonCommandeFournisseur::class)->find($id);

        $lot=$em->getRepository(Lot::class)->find($id);

        $qtproduit=$lot->getNbproduits();
        $entrepots=$em->getRepository(Entrepot::class)->getAvailable($qtproduit);

        if ($request->isMethod('POST')) {
            $entrepot=$em->getRepository(Entrepot::class)->find($request->request->get('entrepot'));

            $lot->setEntrepot($entrepot);
            //$entrepot->setEspacerestant($entrepot->setEspacerestant-$qtproduit);
            $em->persist($lot);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render(':Lots:confirm.html.twig', [
            'lot' => $lot,
            'entrepots' => $entrepots,


        ]);


    }
}
