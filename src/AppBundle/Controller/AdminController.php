<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 10/04/2017
 * Time: 14:47
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends  Controller
{
    /**
     * @Route("/",name="dashboard")
     */
    public function indexAction()
    {

        return $this->render('base.html.twig');

    }

}