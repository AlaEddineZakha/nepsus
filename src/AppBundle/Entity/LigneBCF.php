<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 14:17
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="ligne_bcf")
 */
class LigneBCF
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;
    /**
     * @ORM\Column(type="integer")
     */
    private $quatity;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BonCommandeFournisseur", inversedBy="ligne")
     */
    private $bf;
    /**
     * @var \Doctrine\Common\Collections\Collection|Produit[]
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="lignebcf")
     */
    private $produit;
    /**
     * @ORM\Column(type="float")
     */
    private $totalht;
    /**
     * @ORM\Column(type="float")
     */
    private $totalttc;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;


    public function __construct() {
        $this->produit = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getQuatity()
    {
        return $this->quatity;
    }

    /**
     * @param mixed $quatity
     */
    public function setQuatity($quatity)
    {
        $this->quatity = $quatity;
    }

    public function addProduit(Produit $produit)
    {


        if ($this->produit->contains($produit)) {
            return;
        }
        $this->produit[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setLigneBCF($this);
    }

    public function removeProduit(Produit $produit)
    {
        if (!$this->produit->contains($produit)) {
            return;
        }
        $this->produit->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setLigneBCF(null);
    }


    /**
     * @return ArrayCollection|Produit[]
     */
    public function getProduit()
    {
        return $this->produit;
    }


    /**
     * @param mixed $ligne
     */
    public function setProduit($ligne)
    {
        $this->produit = $ligne;
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
        return $this->bf;
    }

    /**
     * @param mixed $bf
     */
    public function setBc($bf)
    {
        $this->bf = $bf;
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

}