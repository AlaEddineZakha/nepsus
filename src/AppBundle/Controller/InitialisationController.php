<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Permission;
use AppBundle\Entity\Role;
use AppBundle\Entity\RolePermission;
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
        $permission1= new Permission();
        $permission1->setLibele("ajouterclient");
        $permission1->setDescription("Permet d'ajouter un client");
        $permission1->setCreated(new \DateTime());
        $em->persist($permission1);

        $permission2= new Permission();
        $permission2->setLibele("modifierclient");
        $permission2->setDescription("Permet de modifier un client");
        $permission2->setCreated(new \DateTime());
        $em->persist($permission2);

        $permission3= new Permission();
        $permission3->setLibele("supprimerclient");
        $permission3->setDescription("Permet de supprimer un client");
        $permission3->setCreated(new \DateTime());
        $em->persist($permission3);

        $permission4= new Permission();
        $permission4->setLibele("voirclient");
        $permission4->setDescription("Permet de voir la liste des clients");
        $permission4->setCreated(new \DateTime());
        $em->persist($permission4);

        $role=new Role();
        $role->setNom('Magasinier');
        $role->setCreated(new \DateTime());

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($role);
        $em->persist($rolepermission);



        $em->flush();
        return $this->redirectToRoute('dashboard');
    }
}
