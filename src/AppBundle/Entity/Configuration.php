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
     * @ORM\Column(type="string")
     */
    private $siteweb;
    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $logo;
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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
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



}