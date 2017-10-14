<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;

class ResetController extends Controller
{
    public function sendSpoolAction()
    {

        $kernel = $this->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        //Create de Schema
        $input = new ArrayInput(array(
            'command' => 'doctrine:schema:update',"--force" => true
        ));
        $output = new BufferedOutput();
        $application->run($input, $output);
        $content = $output->fetch();
        return new Response($content);

    }

}
