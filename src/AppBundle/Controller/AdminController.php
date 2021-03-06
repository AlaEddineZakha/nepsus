<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 10/04/2017
 * Time: 14:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\BonCommandeClient;
use AppBundle\Entity\Configuration;
use AppBundle\Entity\Modules;
use AppBundle\Entity\Produit;
use AppBundle\Entity\User;
use AppBundle\Form\ModuleFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class AdminController extends  Controller
{
    /**
 * @Route("/",name="dashboard")
 */
    public function indexAction()
    {
        if( $this->getUser()) {

        $em = $this->getDoctrine()->getManager();
            $config = $em->getRepository(Configuration::class)->find(1);

        $user=$em->getRepository(User::class)->find($this->getUser()->getId());

        $idrole=$user->getRole();


            $auth_checker = $this->get('security.authorization_checker');
            $isRoleAdmin = $auth_checker->isGranted('ROLE_SUPER_ADMIN');
            $result = $em->getRepository('AppBundle:Client')->countall();

        return $this->render('dashboard/dashboard1.html.twig', [
            'nbclient' => $result,
            'user'=>$user,
            'isRoleAdmin'=>$isRoleAdmin,
            'config'=>$config

        ]);
        }
        else return $this->redirectToRoute('fos_user_security_login');


    }

    /**
     * @Route("/modules",name="modules")
     */
    public function modulesAction(Request $request)
    {
        $form = $this->createForm(ModuleFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $module = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();


        }


        return $this->render('dashboard/modules.html.twig', [
            'moduleForm' => $form->createView()
        ]);

    }

}