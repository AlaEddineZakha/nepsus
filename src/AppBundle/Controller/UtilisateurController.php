<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends Controller
{



    /**
     * @Route("/utilisateurs/new",name="adduser")
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $roles=$em->getRepository(Role::class)->findAll();

        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $role= $em->getRepository(Role::class)->find($request->request->get('role'));
            $user = new User();
            $user->setPlainPassword($request->request->get('password'));
            if (empty($request->request->get('active'))) {
                $user->setEnabled(0);
            } else {
                $user->setEnabled(1);
            }
            $user->setRole($role);
            $user->setEmail($request->request->get('email'));
            $user->setUsername($request->request->get('username'));
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('listusers');
        }


        return $this->render('Utilisateurs/add.html.twig', [
            'roles' => $roles,


        ]);


    }
    /**
     * @Route("/utilisateurs" , name="listusers")
     */
    public function showAllAction(Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->find($this->getUser()->getId());
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $users = $repository->findAll();
        return $this->render(':Utilisateurs:list.html.twig', [
            'users' => $users,
            'user'=>$user

        ]);


    }
}
