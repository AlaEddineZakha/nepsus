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
 * @ORM\Table(name="bon_commande_fournisseur")
 */
class BonCommandeFournisseur
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;




    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseur", inversedBy="listecommandes")
     * @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="id")
     */
    private $fournisseur;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneBCF[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBCF", mappedBy="bc", cascade={"persist"})
     * @ORM\JoinColumn(name="ligne_id", referencedColumnName="id")
     */
    private $ligne;

    public function __construct() {
        $this->ligne = new ArrayCollection();
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
     * @return ArrayCollection|LigneBCF[]
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


}