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
use AppBundle\Entity\Role;
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

    /**
     * @Route("/config",name="initconfig")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $isdone= $em->getRepository(Configuration::class)->find(1);
        if ($isdone)
        {
            return $this->redirectToRoute('alreadyconfigured');
        }
        else {

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
                $admin->setRole($em->getRepository(Role::class)->findOneBy(array('nom' => 'admin')));
                $admin->setEmail($request->request->get('email'));
                $admin->setUsername($request->request->get('username'));
                $em->persist($admin);
                $config->setId(1);
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
    }

    public function loadingAction()
    {
        return $this->render(':Configuration:loading.html.twig');
    }

    /**
     * @Route("/configuration/application" ,name="configurationapplication")
     */
    public function applicationconfigAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($this->getUser()->getId());
        $config = $em->getRepository(Configuration::class)->find(1);
        $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));



        if ($request->isMethod('POST')) {



            $config->setNotificationcommande($request->request->get('notification'));
            $config->setFootercapitale($request->request->get('affichercapitale'));
            $config->setEchancefacture($request->request->get('echeance'));
            $config->setSeuilalerte($request->request->get('seuil'));

            $config->setIndicateurActivites($request->request->get('ind_activites'));
            $config->setIndicateurBenefice($request->request->get('ind_benefice'));
            $config->setIndicateurClients($request->request->get('ind_clients'));
            $config->setIndicateurCmdattente($request->request->get('ind_cmdattente'));
            $config->setIndicateurCmdtotals($request->request->get('ind_cmdtoatals'));
            $config->setIndicateurEntrepots($request->request->get('ind_entrepots'));
            $config->setIndicateurFactures($request->request->get('ind_factures'));
            $config->setIndicateurProduits($request->request->get('ind_produits'));
            $config->setIndicateurUsers($request->request->get('ind_user'));
            $config->setIndicateurTaches($request->request->get('ind_taches'));
            $em->persist($config);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render(':Configuration:ConfigurationApplication.html.twig', [
            'config' => $config,
            'user' => $user,

        ]);
    }


    /**
     * @Route("/configuration/generale" ,name="configurationgenerale")
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($this->getUser()->getId());
        $config = $em->getRepository(Configuration::class)->find(1);
        $modulecategories=$em->getRepository(Modules::class)->findOneBy(array('nom' => 'Categories'));



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

        return $this->render(':Configuration:ConfigurationEntreprise.html.twig', [
            'config' => $config,
            'user' => $user,

        ]);
    }

}
