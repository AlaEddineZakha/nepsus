<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 02/10/2017
 * Time: 11:19
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="configuration")
 */
class Configuration
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $raison;

    /**
     * @ORM\Column(type="boolean")
     */
    private $init;

    /**
     * @ORM\Column(type="string")
     */
    private $ville;

    /**
     * @ORM\Column(type="integer" , nullable=true)
     */
    private $echancefacture;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seuilalerte;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $notificationcommande;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $footercapitale;

    /**
     * @ORM\Column(type="string")
     */
    private $siteweb;

    /**
     * @ORM\Column(type="string")
     */
    private $adresse;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fax;
    /**
     * @ORM\Column(type="string")
     */
    private $pays;
    /**
     * @ORM\Column(type="string")
     */
    private $formejuridique;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $codedouane;
    /**
     * @ORM\Column(type="string")
     */
    private $matriculefiscale;
    /**
     * @ORM\Column(type="string")
     */
    private $registredecommerce;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $iban;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $bic;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $rib;
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="administrateur_id", referencedColumnName="id")
     */
    private $administrateur;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $abreviation;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $lastmodified;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_benefice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_produits;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_cmdtotals;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_clients;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_cmdattente;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_entrepots;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_factures;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_users;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_activites;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $indicateur_taches;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * @param mixed $raison
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
    }



    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getFormejuridique()
    {
        return $this->formejuridique;
    }

    /**
     * @param mixed $formejuridique
     */
    public function setFormejuridique($formejuridique)
    {
        $this->formejuridique = $formejuridique;
    }

    /**
     * @return mixed
     */
    public function getCodedouane()
    {
        return $this->codedouane;
    }

    /**
     * @param mixed $codedouane
     */
    public function setCodedouane($codedouane)
    {
        $this->codedouane = $codedouane;
    }

    /**
     * @return mixed
     */
    public function getMatriculefiscale()
    {
        return $this->matriculefiscale;
    }

    /**
     * @param mixed $matriculefiscale
     */
    public function setMatriculefiscale($matriculefiscale)
    {
        $this->matriculefiscale = $matriculefiscale;
    }

    /**
     * @return mixed
     */
    public function getRegistredecommerce()
    {
        return $this->registredecommerce;
    }

    /**
     * @param mixed $registredecommerce
     */
    public function setRegistredecommerce($registredecommerce)
    {
        $this->registredecommerce = $registredecommerce;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return mixed
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * @param mixed $rib
     */
    public function setRib($rib)
    {
        $this->rib = $rib;
    }

    /**
     * @return mixed
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * @param mixed $administrateur
     */
    public function setAdministrateur($administrateur)
    {
        $this->administrateur = $administrateur;
    }

    /**
     * @return mixed
     */
    public function getAbreviation()
    {
        return $this->abreviation;
    }

    /**
     * @param mixed $abreviation
     */
    public function setAbreviation($abreviation)
    {
        $this->abreviation = $abreviation;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getLastmodified()
    {
        return $this->lastmodified;
    }

    /**
     * @param mixed $lastmodified
     */
    public function setLastmodified($lastmodified)
    {
        $this->lastmodified = $lastmodified;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * @param mixed $siteweb
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;
    }

    /**
     * @return mixed
     */
    public function getInit()
    {
        return $this->init;
    }

    /**
     * @param mixed $init
     */
    public function setInit($init)
    {
        $this->init = $init;
    }

    /**
     * @return mixed
     */
    public function getEchancefacture()
    {
        return $this->echancefacture;
    }

    /**
     * @param mixed $echancefacture
     */
    public function setEchancefacture($echancefacture)
    {
        $this->echancefacture = $echancefacture;
    }

    /**
     * @return mixed
     */
    public function getSeuilalerte()
    {
        return $this->seuilalerte;
    }

    /**
     * @param mixed $seuilalerte
     */
    public function setSeuilalerte($seuilalerte)
    {
        $this->seuilalerte = $seuilalerte;
    }

    /**
     * @return mixed
     */
    public function getNotificationcommande()
    {
        return $this->notificationcommande;
    }

    /**
     * @param mixed $notificationcommande
     */
    public function setNotificationcommande($notificationcommande)
    {
        $this->notificationcommande = $notificationcommande;
    }

    /**
     * @return mixed
     */
    public function getFootercapitale()
    {
        return $this->footercapitale;
    }

    /**
     * @param mixed $footercapitale
     */
    public function setFootercapitale($footercapitale)
    {
        $this->footercapitale = $footercapitale;
    }

    /**
     * @return mixed
     */
    public function getIndicateurBenefice()
    {
        return $this->indicateur_benefice;
    }

    /**
     * @param mixed $indicateur_benefice
     */
    public function setIndicateurBenefice($indicateur_benefice)
    {
        $this->indicateur_benefice = $indicateur_benefice;
    }

    /**
     * @return mixed
     */
    public function getIndicateurProduits()
    {
        return $this->indicateur_produits;
    }

    /**
     * @param mixed $indicateur_produits
     */
    public function setIndicateurProduits($indicateur_produits)
    {
        $this->indicateur_produits = $indicateur_produits;
    }

    /**
     * @return mixed
     */
    public function getIndicateurCmdtotals()
    {
        return $this->indicateur_cmdtotals;
    }

    /**
     * @param mixed $indicateur_cmdtotals
     */
    public function setIndicateurCmdtotals($indicateur_cmdtotals)
    {
        $this->indicateur_cmdtotals = $indicateur_cmdtotals;
    }

    /**
     * @return mixed
     */
    public function getIndicateurClients()
    {
        return $this->indicateur_clients;
    }

    /**
     * @param mixed $indicateur_clients
     */
    public function setIndicateurClients($indicateur_clients)
    {
        $this->indicateur_clients = $indicateur_clients;
    }

    /**
     * @return mixed
     */
    public function getIndicateurCmdattente()
    {
        return $this->indicateur_cmdattente;
    }

    /**
     * @param mixed $indicateur_cmdattente
     */
    public function setIndicateurCmdattente($indicateur_cmdattente)
    {
        $this->indicateur_cmdattente = $indicateur_cmdattente;
    }

    /**
     * @return mixed
     */
    public function getIndicateurEntrepots()
    {
        return $this->indicateur_entrepots;
    }

    /**
     * @param mixed $indicateur_entrepots
     */
    public function setIndicateurEntrepots($indicateur_entrepots)
    {
        $this->indicateur_entrepots = $indicateur_entrepots;
    }

    /**
     * @return mixed
     */
    public function getIndicateurFactures()
    {
        return $this->indicateur_factures;
    }

    /**
     * @param mixed $indicateur_factures
     */
    public function setIndicateurFactures($indicateur_factures)
    {
        $this->indicateur_factures = $indicateur_factures;
    }

    /**
     * @return mixed
     */
    public function getIndicateurUsers()
    {
        return $this->indicateur_users;
    }

    /**
     * @param mixed $indicateur_users
     */
    public function setIndicateurUsers($indicateur_users)
    {
        $this->indicateur_users = $indicateur_users;
    }

    /**
     * @return mixed
     */
    public function getIndicateurActivites()
    {
        return $this->indicateur_activites;
    }

    /**
     * @param mixed $indicateur_activites
     */
    public function setIndicateurActivites($indicateur_activites)
    {
        $this->indicateur_activites = $indicateur_activites;
    }

    /**
     * @return mixed
     */
    public function getIndicateurTaches()
    {
        return $this->indicateur_taches;
    }

    /**
     * @param mixed $indicateur_taches
     */
    public function setIndicateurTaches($indicateur_taches)
    {
        $this->indicateur_taches = $indicateur_taches;
    }



}