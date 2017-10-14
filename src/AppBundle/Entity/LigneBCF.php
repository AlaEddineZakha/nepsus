<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 25/05/2017
 * Time: 07:19
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

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
    private $bc;
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="ligne")
     */
    private $produit;

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

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
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




}