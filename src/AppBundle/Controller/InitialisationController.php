<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Permission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InitialisationController extends Controller
{

    /**
     *@Route("/initialiser", name="initialiserapp")
     */
    public function initialiserAction()
    {
        $em = $this->getDoctrine()->getManager();
        $permission= new Permission();
        $permission->setLibele("ajouterclient");
        $permission->setDescription("Permet d'ajouter un client");
        $permission->setCreated(new \DateTime());
        $em->persist($permission);

        $permission= new Permission();
        $permission->setLibele("modifierclient");
        $permission->setDescription("Permet de modifier un client");
        $permission->setCreated(new \DateTime());
        $em->persist($permission);

        $permission= new Permission();
        $permission->setLibele("supprimerclient");
        $permission->setDescription("Permet de supprimer un client");
        $permission->setCreated(new \DateTime());
        $em->persist($permission);

        $permission= new Permission();
        $permission->setLibele("voirclient");
        $permission->setDescription("Permet de voir la liste des clients");
        $permission->setCreated(new \DateTime());
        $em->persist($permission);



        $em->flush();
        return $this->redirectToRoute('dashboard');
    }
}
