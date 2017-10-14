<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConfigurationController extends Controller
{
    public function indexAction()
    {
        return $this->render(':Configuration:configuration.html.twig');
    }
}
