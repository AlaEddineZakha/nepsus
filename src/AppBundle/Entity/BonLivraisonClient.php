<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 01/07/2017
 * Time: 15:01
 */

namespace AppBundle\Entity;



use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="bon_livraison_client")
 */
class BonLivraisonClient
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;




    /**
     * Un lot a une seulle commande
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\BonCommandeClient", mappedBy="livraison" , fetch="EAGER")
     */
    private $bc;
    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneBLC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBLC", mappedBy="livraison", cascade={"persist", "remove"} , fetch="EAGER")
     * @ORM\JoinColumn(name="lignelc_id", referencedColumnName="id" )
     */
    private $lignelc;
    /**
     * @ORM\Column(type="string")
     */
    private $statut;
    /**
     * @ORM\Column(type="float")
     */
    private $totalht;
    /**
     * @ORM\Column(type="float")
     */
    private $totalttc;

    /**
     * @ORM\Column(type="datetime")
     */private $created;



    public function __construct() {
        $this->lignelc = new ArrayCollection();

    }


    public function addLignelc(LigneBLC $ligne)
    {


        if ($this->lignelc->contains($ligne)) {
            return;
        }
        $this->lignelc[] = $ligne;
        // needed to update the owning side of the relationship!
        $ligne->setLivraison($this);
    }

    public function removeLignelc(LigneBLC $ligne)
    {
        if (!$this->lignelc->contains($ligne)) {
            return;
        }
        $this->lignelc->removeElement($ligne);
        // needed to update the owning side of the relationship!
        $ligne->setLivraison(null);
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
    public function getBc()
    {
        return $this->bc;
    }

    /**
     * @param mixed $bc
     */
    public function setBc($bc)
    {
        $this->bc = $bc;
    }

    /**
     * @return mixed
     */
    public function getLignelc()
    {
        return $this->lignelc;
    }

    /**
     * @param mixed $lignelc
     */
    public function setLignelc($lignelc)
    {
        $this->lignelc = $lignelc;
    }





    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getTotalht()
    {
        return $this->totalht;
    }

    /**
     * @param mixed $totalht
     */
    public function setTotalht($totalht)
    {
        $this->totalht = $totalht;
    }

    /**
     * @return mixed
     */
    public function getTotalttc()
    {
        return $this->totalttc;
    }

    /**
     * @param mixed $totalttc
     */
    public function setTotalttc($totalttc)
    {
        $this->totalttc = $totalttc;
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




}