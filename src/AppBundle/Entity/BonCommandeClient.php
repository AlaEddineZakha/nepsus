<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 08/05/2017
 * Time: 23:49
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bon_commande_client")
 */
class BonCommandeClient
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id ;




    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="listecommandes" , fetch="EAGER")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneBCC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBCC", mappedBy="bc", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="ligne_id", referencedColumnName="id" )
     */
    private $ligne;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|FactureClient[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FactureClient", mappedBy="bc", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="facture_id", referencedColumnName="id" )
     */
    private $facture;


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

    /**
     * @ORM\Column(type="datetime")
     */private $dateecheance;






    public function __construct() {
        $this->ligne = new ArrayCollection();
        $this->facture = new ArrayCollection();
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
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
    public function addLigne(LigneBCC $produit)
    {


        if ($this->ligne->contains($produit)) {
            return;
        }
        $this->ligne[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setBc($this);
    }

    public function removeLigne(LigneBCC $produit)
    {
        if (!$this->ligne->contains($produit)) {
            return;
        }
        $this->ligne->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setBc(null);
    }


    /**
     * @return ArrayCollection|LigneBCC[]
     */
    public function getLigne()
    {
        return $this->ligne;
    }


    /**
     * @param mixed $ligne
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;
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

    /**
     * @return mixed
     */
    public function getDateecheance()
    {
        return $this->dateecheance;
    }

    /**
     * @param mixed $dateecheance
     */
    public function setDateecheance($dateecheance)
    {
        $this->dateecheance = $dateecheance;
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
     * @return ArrayCollection|FactureClient[]
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * @param $facture
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;
    }


    public function addFacture(FactureClient $fac)
    {


        if ($this->facture->contains($fac)) {
            return;
        }
        $this->facture[] = $fac;
        // needed to update the owning side of the relationship!
        $fac->setBc($this);
    }

    public function removeFacture(FactureClient $fac)
    {
        if (!$this->facture->contains($fac)) {
            return;
        }
        $this->facture->removeElement($fac);
        // needed to update the owning side of the relationship!
        $fac->setBc(null);
    }










}