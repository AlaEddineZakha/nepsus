<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 10/04/2017
 * Time: 14:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Modules;
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
        $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));
        $moduleentrepots=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Entrepots'));
        $modulefournisseurs=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Fournisseurs'));
        $result = $em->getRepository('AppBundle:Client')
            ->count();

        return $this->render('dashboard/dashboard1.html.twig', [
            'nbclient' => $result,
            'modulecategories'=>$modulecategories,
            'moduleentrepots'=>$moduleentrepots,
            'modulefournisseurs'=>$modulefournisseurs

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