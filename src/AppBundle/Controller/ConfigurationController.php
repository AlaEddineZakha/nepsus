<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Configuration;
use AppBundle\Entity\FactureClient;
use AppBundle\Entity\HistoriqueClient;
use AppBundle\Entity\LigneFC;
use AppBundle\Entity\LigneBCC;
use AppBundle\Entity\BonCommandeClient;
use AppBundle\Entity\Client;
use AppBundle\Entity\Modules;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class ConfigurationController extends Controller
{
    public function indexAction(Request $request)
    {

        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $config = new Configuration();
            $admin = new User();
            $modules = $em->getRepository(Modules::class)->findAll();
            foreach ($modules as $module) {
                // $advert est une instance de Advert
                if ($module->getNom() == 'Entrepots') {
                    if (empty($request->request->get('module_entrepots'))) {
                        $module->setActive(0);
                        $em->persist($module);
                    } else {
                        $module->setActive(1);
                        $em->persist($module);

                    }
                }

                if ($module->getNom() == 'Fournisseurs') {
                    if (empty($request->request->get('module_fournisseurs'))) {
                        $module->setActive(0);
                        $em->persist($module);
                    } else {
                        $module->setActive(1);
                        $em->persist($module);

                    }
                }

                if ($module->getNom() == 'Categories') {
                    if (empty($request->request->get('module_categories'))) {
                        $module->setActive(0);
                        $em->persist($module);
                    } else {
                        $module->setActive(1);
                        $em->persist($module);

                    }
                }
            }

            $admin->setPlainPassword($request->request->get('password'));
            $admin->setEnabled('true');
            $admin->setSuperAdmin('true');
            $admin->setRoles(array('ROLE_SUPER_ADMIN'));
            $admin->setEmail($request->request->get('email'));
            $admin->setUsername($request->request->get('username'));
            $em->persist($admin);

            $config->setInit(1);
            $config->setMatriculefiscale($request->request->get('mf'));
            $config->setRaison($request->request->get('raison'));
            $config->setAdresse($request->request->get('addresse'));
            $config->setVille($request->request->get('ville'));
            $config->setPays($request->request->get('pays'));
            $config->setTelephone($request->request->get('telephone'));
            $config->setSiteweb($request->request->get('siteweb'));
            $config->setRegistredecommerce($request->request->get('registre'));
            $config->setCreated(new \DateTime());
            $config->setFax($request->request->get('fax'));
            $config->setFormejuridique($request->request->get('formejuridique'));
            $config->setCodedouane($request->request->get('codedouane'));
            $config->setIban($request->request->get('iban'));
            $config->setRib($request->request->get('rib'));
            $config->setBic($request->request->get('bic'));
            $config->setAbreviation($request->request->get('abreviation'));
            $config->setAdministrateur($admin);


            $em->persist($config);
            $em->flush();

            return $this->redirectToRoute('loadingconfig');
        }

        return $this->render(':Configuration:configuration.html.twig');
    }

    public function loadingAction()
    {
        return $this->render(':Configuration:loading.html.twig');
    }

    public function editAction(Request $request ,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository(Configuration::class)->find($id);
        $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));
        $logo=$config->getLogo();


            $image = base64_encode(stream_get_contents($logo));

        if ($request->isMethod('POST')) {


            $config->setInit(1);
            $config->setMatriculefiscale($request->request->get('mf'));
            $config->setRaison($request->request->get('raison'));
            $config->setAdresse($request->request->get('addresse'));
            $config->setVille($request->request->get('ville'));
            $config->setPays($request->request->get('pays'));
            $config->setTelephone($request->request->get('telephone'));
            $config->setSiteweb($request->request->get('siteweb'));
            $config->setRegistredecommerce($request->request->get('registre'));
            $config->setLastmodified(new \DateTime());
            $config->setFax($request->request->get('fax'));
            $config->setFormejuridique($request->request->get('formejuridique'));
            $config->setCodedouane($request->request->get('codedouane'));
            $config->setIban($request->request->get('iban'));
            $config->setRib($request->request->get('rib'));
            $config->setBic($request->request->get('bic'));
            $config->setAbreviation($request->request->get('abreviation'));



            $em->persist($config);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render(':Configuration:configurationgenerale.html.twig', [
            'config' => $config

        ]);
    }

}
