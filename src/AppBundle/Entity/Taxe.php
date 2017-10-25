<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 01/07/2017
 * Time: 15:04
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="taxe")
 */
class Taxe
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="float")
     */
    private $montant;
    /**
     * @ORM\Column(type="string")
     */
    private $active;
    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|Produit[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Produit", mappedBy="tva", cascade={"persist"})
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     */
    private $produits;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created;
    public function __construct()
    {
        $this->produits = new ArrayCollection();

    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }



    /**
     * @param mixed $produits
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;
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


    public function addProduits(Produit $produit)
    {


        if ($this->produits->contains($produit)) {
            return;
        }
        $this->produits[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setTva($this);
    }

    public function removeProduits(Produit $produit)
    {
        if (!$this->produits->contains($produit)) {
            return;
        }
        $this->produits->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setTva(null);
    }


    /**
     * @return ArrayCollection|Produit[]
     */
    public function getProduits()
    {
        return $this->produits;
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






}