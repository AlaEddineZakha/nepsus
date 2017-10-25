<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;

class ResetController extends Controller
{
    public function createUserAction()
    {

        $kernel = $this->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        $username='test';
        $email="test@gmail.com";
        $pwd="test";
        $input = new ArrayInput(array(
            'command' => "fos:user:create",
            'username'=>$username,
            'email'=>$email,
            'password'=>$pwd,
        ));
        $output = new BufferedOutput();
        $application->run($input, $output);
        $response = $this->forward('AppBundle:Reset:activateUser', array(
            'username'  => $username,

        ));

        // ... further modify the response or return it directly

        return $response;


    }

    public function activateUserAction($username)
    {

        $kernel = $this->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'fos:user:activate',
            'username' => $username,
        ));
        $output = new BufferedOutput();
        $application->run($input, $output);

        $response = $this->forward('AppBundle:Reset:promoteUser', array(
            'username'  => $username,

        ));

        // ... further modify the response or return it directly

        return $response;

    }

    public function promoteUserAction($username)
    {

        $kernel = $this->get('kernel');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'fos:user:promote',
            'username' => $username,
            'role' => 'ROLE_SUPER_ADMIN'
        ));
        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();
        return new Response($content);

    }


}
