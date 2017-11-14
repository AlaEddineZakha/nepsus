<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 27/04/2017
 * Time: 01:46
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM ;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

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
     */private $id ;



    /**
     * @ORM\Column(type="string")
     */private $matriculefiscale;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="3",minMessage="This value is to shoort")
     */private $raison;

    /**
     * @ORM\Column(type="string",nullable=true , unique=true)
     */private $email;
    /**
     * @ORM\Column(type="string")
     */private $adresse;
    /**
     * @ORM\Column(type="string",nullable=true)
     */private $region;
    /**
     * @ORM\Column(type="string",nullable=true)
     */private $ville;
    /**
     * @ORM\Column(type="string")
     */private $pays;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */private $telephone;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */private $mobile;
    /**
     * @ORM\Column(type="integer",nullable=true)
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */private $fax;
    /**
     * @ORM\Column(type="string", nullable=true)
     */private $siteweb;

    /**
     * @ORM\Column(type="string")
     */
    private $registre;

    /**
     * @ORM\Column(type="string")
     */
    private $formejuridique;





    /**
     * @ORM\Column(type="datetime")
     */private $created;



    /**
     * One Product has Many Features.
     * @var Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BonCommandeFournisseur", mappedBy="fournisseur" , cascade={"persist", "remove"},fetch="EAGER")
     */
    private $listecommandes;

    /**
     * One Product has Many Features.
     * @var Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HistoriqueFournisseur", mappedBy="fournisseur" , cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $historiques;


    /**
     * One Client has Many Contacts.
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\ContactClient",
     *     mappedBy="client" ,
     *     cascade={"persist"},
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true
     * )
     */
    private $contacts;


    public function __construct() {
        $this->listecommandes = new ArrayCollection();
        $this->historiques = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
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





    public function addContact(ContactClient $contact)
    {


        if ($this->contacts->contains($contact)) {
            return;
        }
        $this->contacts[] = $contact;
        // needed to update the owning side of the relationship!
        $contact->setClient($this);
    }

    public function removeContact(ContactClient $contact)
    {
        if (!$this->contacts->contains($contact)) {
            return;
        }
        $this->contacts->removeElement($contact);
        // needed to update the owning side of the relationship!
        $contact->setClient(null);
    }


    /**
     * @return ArrayCollection|ContactClient[]
     */
    public function getContacts()
    {
        return $this->contacts;
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
     * @return ArrayCollection|HistoriqueFournisseur[]
     */
    public function getHistoriques()
    {
        return $this->historiques;
    }


    /**
     * @return mixed
     */
    public function getListecommandes()
    {
        return $this->listecommandes;
    }

    /**
     * @param mixed $listecommandes
     */
    public function setListecommandes($listecommandes)
    {
        $this->listecommandes = $listecommandes;
    }




    public function addHistorique(HistoriqueFournisseur $his)
    {


        if ($this->historiques->contains($his)) {
            return;
        }
        $this->historiques[] = $his;
        // needed to update the owning side of the relationship!
        $his->setFournisseur($this);
    }

    public function removeHistorique(HistoriqueFournisseur $his)
    {
        if (!$this->historiques->contains($his)) {
            return;
        }
        $this->historiques->removeElement($his);
        // needed to update the owning side of the relationship!
        $his->setFournisseur(null);
    }





}
