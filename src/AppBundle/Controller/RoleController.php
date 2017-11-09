<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Permission;
use AppBundle\Entity\Role;
use AppBundle\Entity\RolePermission;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
    /**
     * @Route("/roles/new",name="addrole")
     *
     */
    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $role =$em->getRepository('AppBundle:Role')->find($user->getId());

        if ($request->isMethod('POST')) {
            $role = new Role();
            $role->setNom($request->request->get('libele'));
            $role->setDescription($request->request->get('description'));

            $role->setCreated(new \DateTime());



            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }


        return $this->render(':Roles:add.html.twig',[
            'role'=>$role,
            'user'=>$user
        ]);


    }

    /**
     * @Route("/roles/{id}/edit",name="editrole")
     *
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $role =$em->getRepository('AppBundle:Role')->find($id);
        $currentrolepermission =$em->getRepository('AppBundle:RolePermission')->findBy(array('role' => $role));


        if ($request->isMethod('POST')) {

            $role->setNom($request->request->get('libele'));
            $role->setDescription($request->request->get('description'));


            if (($request->request->get('ajouterclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'ajouterclient'));
                $rolepermission=new RolePermission();
                $rolepermission->setPermission($permission);
                $rolepermission->setRole($role);
                $em->persist($rolepermission);
            }
            if (empty($request->request->get('ajouterclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'ajouterclient'));
                $rolepermission =$em->getRepository(RolePermission::class)->findOneBy(array('permission' =>$permission->getId() ));
                if (!empty($rolepermission))
                {   dump($rolepermission);
                    $em->remove($rolepermission);
                }


            }

            if (($request->request->get('modifierclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'modifierclient'));
                $rolepermission=new RolePermission();
                $rolepermission->setPermission($permission);
                $rolepermission->setRole($role);
                $em->persist($rolepermission);
            }
            if (empty($request->request->get('modifierclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'modifierclient'));
                $rolepermission =$em->getRepository(RolePermission::class)->findOneBy(array('permission' =>$permission->getId() ));
                if (!empty($rolepermission))
                {
                    dump($rolepermission);
                    $em->remove($rolepermission);
                }

            }

            if (($request->request->get('supprimerclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'supprimerclient'));
                $rolepermission=new RolePermission();
                $rolepermission->setPermission($permission);
                $rolepermission->setRole($role);
                $em->persist($rolepermission);
            }
            if (empty($request->request->get('supprimerclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'supprimerclient'));
                $rolepermission =$em->getRepository(RolePermission::class)->findOneBy(array('permission' =>$permission->getId() ));
                if (!empty($rolepermission))
                {
                    dump($rolepermission);
                    $em->remove($rolepermission);
                }

            }

            if (($request->request->get('voirclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'voirclient'));
                $rolepermission=new RolePermission();
                $rolepermission->setPermission($permission);
                $rolepermission->setRole($role);
                $em->persist($rolepermission);
            }
            if (empty($request->request->get('voirclient'))) {

                $permission=$em->getRepository('AppBundle:Permission')->findOneBy(array('libele' => 'voirclient'));
                $rolepermission =$em->getRepository(RolePermission::class)->findOneBy(array('permission' =>$permission->getId() ));
                if (!empty($rolepermission))
                {

                    $em->remove($rolepermission);
                }

            }


            $em->persist($role);
            $em->flush();


            return $this->redirectToRoute('listroles');
        }
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());

        return $this->render(':Roles:edit.html.twig',[
            'role'=>$role,
            'user'=>$user,
            'rolepermissions'=>$currentrolepermission
        ]);


    }

    /**
     * @Route("/roles" , name="listroles")
     */
    public function showAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $repository = $this->getDoctrine()->getRepository('AppBundle:Role');

        $roles = $repository->findAll();
        return $this->render(':Roles:list.html.twig', [
            'roles' => $roles,
            'user'=>$user

        ]);


    }
}
