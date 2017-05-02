<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 27/04/2017
 * Time: 01:46
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fournisseur")
 */
class Fournisseur
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;
    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $codepostal;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $adresse;
    /**
     * @ORM\Column(type="string")
     */
    private $pays;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $ville;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $region;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */
    private $telephone;
    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */
    private $fax;
    /**
     * @ORM\Column(type="boolean")
     */
    private $tva;
    /**
     * @ORM\Column(type="string")
     */
    private $capital;
    /**
     * @ORM\Column(type="string")
     */
    private $registre;
    /**
     * @ORM\Column(type="string")
     */
    private $matriculefiscal;
    /**
     * @ORM\Column(type="string")
     */
    private $formejuridique;
    /**
     * @ORM\Column(type="string")
     */
    private $nbemp;
    /**
     * @ORM\Column(type="string")
     */
    private $codedouane;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $siteweb;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @param mixed $codepostal
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;
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
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * @param mixed $tva
     */
    public function setTva($tva)
    {
        $this->tva = $tva;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @return mixed
     */
    public function getRegistre()
    {
        return $this->registre;
    }

    /**
     * @param mixed $registre
     */
    public function setRegistre($registre)
    {
        $this->registre = $registre;
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
    public function getNbemp()
    {
        return $this->nbemp;
    }

    /**
     * @param mixed $nbemp
     */
    public function setNbemp($nbemp)
    {
        $this->nbemp = $nbemp;
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
    public function getMatriculefiscal()
    {
        return $this->matriculefiscal;
    }

    /**
     * @param mixed $matriculefiscal
     */
    public function setMatriculefiscal($matriculefiscal)
    {
        $this->matriculefiscal = $matriculefiscal;
    }






}
