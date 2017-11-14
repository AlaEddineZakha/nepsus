<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 13:56
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="bon_commande_fournisseur")
 */
class BonCommandeFournisseur
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id ;




    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseur", inversedBy="listecommandes" , fetch="EAGER")
     * @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="id")
     */
    private $fournisseur;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneBCF[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBCF", mappedBy="bf", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="ligne_id", referencedColumnName="id" )
     */
    private $ligne;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|FactureFournisseur[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FactureFournisseur", mappedBy="bf", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="facture_id", referencedColumnName="id" )
     */
    private $facture;


    /**
     * Un lot a une seulle commande
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Lot", mappedBy="commandefournisseur")
     */
    private $lot;


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






    public function addLigne(LigneBCF $produit)
    {


        if ($this->ligne->contains($produit)) {
            return;
        }
        $this->ligne[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setBc($this);
    }

    public function removeLigne(LigneBCF $produit)
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
     * @return ArrayCollection|FactureFournisseur[]
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


    public function addFacture(FactureFournisseur $fac)
    {


        if ($this->facture->contains($fac)) {
            return;
        }
        $this->facture[] = $fac;
        // needed to update the owning side of the relationship!
        $fac->setBc($this);
    }

    public function removeFacture(FactureFournisseur $fac)
    {
        if (!$this->facture->contains($fac)) {
            return;
        }
        $this->facture->removeElement($fac);
        // needed to update the owning side of the relationship!
        $fac->setBc(null);
    }

    /**
     * @return mixed
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * @param mixed $fournisseur
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;
    }

    /**
     * @return mixed
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @param mixed $lot
     */
    public function setLot($lot)
    {
        $this->lot = $lot;
    }








}