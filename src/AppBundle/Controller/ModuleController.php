<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Modules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
class ModuleController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


}
