<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 12:51
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use AppBundle\Entity\Modules;
use AppBundle\Entity\Permission;
use AppBundle\Entity\Role;
use AppBundle\Entity\RolePermission;
use AppBundle\Entity\User;
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

        $module1= new Modules();
        $module1->setNom("Entrepots");
        $module1->setActive("Module entrepots");
        $manager->persist($module1);

        $module2= new Modules();
        $module2->setNom("Fournisseurs");
        $module2->setActive("Module Fournisseurs");
        $manager->persist($module2);

        $module3= new Modules();
        $module3->setNom("Categories");
        $module3->setActive("Module Categories");
        $manager->persist($module3);




        $role=new Role();
        $role->setNom('Magasinier');
        $role->setDescription('Magasinier');
        $role->setCreated(new \DateTime());
        $manager->persist($role);

        $categorie= new Category();
        $categorie->setNom("Indéfinie");
        $categorie->setDepth(1);
        $manager->persist($categorie);



        $roleadmin=new Role();
        $roleadmin->setNom('admin');
        $roleadmin->setDescription('Toutes les permission');
        $roleadmin->setCreated(new \DateTime());
        $manager->persist($roleadmin);

        $demouser = new User();
        $demouser->setPlainPassword('demo');
        $demouser->setEnabled('true');
        $demouser->setEmail("demouser@nepsus.com");
        $demouser->setUsername('demo');
        $manager->persist($demouser);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission1);
        $rolepermission->setRole($roleadmin);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission2);
        $rolepermission->setRole($roleadmin);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission3);
        $rolepermission->setRole($roleadmin);
        $manager->persist($rolepermission);

        $rolepermission= new RolePermission();
        $rolepermission->setPermission($permission4);
        $rolepermission->setRole($roleadmin);
        $manager->persist($rolepermission);






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