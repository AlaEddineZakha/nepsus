<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 12:51
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Permission;
use AppBundle\Entity\Role;
use AppBundle\Entity\RolePermission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $permission1= new Permission();
        $permission1->setLibele("ajouterclient");
        $permission1->setDescription("Permet d'ajouter un client");
        $permission1->setCreated(new \DateTime());
        $manager->persist($permission1);

        $permission2= new Permission();
        $permission2->setLibele("modifierclient");
        $permission2->setDescription("Permet d'ajouter un client");
        $permission2->setCreated(new \DateTime());
        $manager->persist($permission2);

        $permission3= new Permission();
        $permission3->setLibele("supprimerclient");
        $permission3->setDescription("Permet d'ajouter un client");
        $permission3->setCreated(new \DateTime());
        $manager->persist($permission3);

        $permission4= new Permission();
        $permission4->setLibele("voirclient");
        $permission4->setDescription("Permet d'ajouter un client");
        $permission4->setCreated(new \DateTime());
        $manager->persist($permission4);


        $role=new Role();
        $role->setNom('Magasinier');
        $role->setDescription('Magasinier');
        $role->setCreated(new \DateTime());
        $manager->persist($role);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission1);
        $rolepermission->setRole($role);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission2);
        $rolepermission->setRole($role);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission3);
        $rolepermission->setRole($role);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission4);
        $rolepermission->setRole($role);
        $manager->persist($rolepermission);


        $manager->flush();
    }

}