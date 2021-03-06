<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 03/05/2017
 * Time: 11:59
 */

namespace AppBundle\Entity;



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 * @ORM\Table(name="produit")
 */
class Produit
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
    private $libele;

    /**
     * @ORM\Column(type="string")
     */
    private $etat;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="string")
     */
    private $type;
    /**
     * @ORM\Column(type="string")
     */
    private $limitestock;
    /**
     * @ORM\Column(type="string")
     */
    private $codedouane;
    /**
     * @ORM\Column(type="string")
     */
    private $origine;
    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Taxe", inversedBy="produits")
     */
    private $tva;

    /**
     * @ORM\Column(type="float")
     */
    private $prixvente;
    /**
     * @ORM\Column(type="float")
     */
    private $prixachat;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products" )
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;



    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|LigneBCC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBCC", mappedBy="produit" ,cascade={"persist"})
     * @ORM\JoinColumn(name="ligne_id", referencedColumnName="id")
     */
    private $ligne;

    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|LigneBCF[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBCF", mappedBy="produit" ,cascade={"persist"})
     * @ORM\JoinColumn(name="lignebcf_id", referencedColumnName="id")
     */
    private $lignebcf;

    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|LigneFC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneFC", mappedBy="produit" ,cascade={"persist"})
     * @ORM\JoinColumn(name="lignefc_id", referencedColumnName="id")
     */
    private $lignefc;

    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|LigneFF[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneFF", mappedBy="produit" ,cascade={"persist"})
     * @ORM\JoinColumn(name="ligneff_id", referencedColumnName="id")
     */
    private $ligneff;

    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|LigneBLC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneBLC", mappedBy="produit" ,cascade={"persist"})
     * @ORM\JoinColumn(name="lignelc_id", referencedColumnName="id")
     */
    private $lignelc;




    public function __construct() {
        $this->ligne = new ArrayCollection();
        $this->lignefc = new ArrayCollection();
        $this->lignebcf = new ArrayCollection();
        $this->ligneff = new ArrayCollection();
        $this->lignelc = new ArrayCollection();

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
    public function getLibele()
    {
        return $this->libele;
    }

    /**
     * @param mixed $libele
     */
    public function setLibele($libele)
    {
        $this->libele = $libele;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getLimitestock()
    {
        return $this->limitestock;
    }

    /**
     * @param mixed $limitestock
     */
    public function setLimitestock($limitestock)
    {
        $this->limitestock = $limitestock;
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
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * @param mixed $origine
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;
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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Produit
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function addLigne(LigneBCC $produit)
    {


        if ($this->ligne->contains($produit)) {
            return;
        }
        $this->ligne[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setProduit($this);
    }

    public function removeLigne(LigneBCC $produit)
    {
        if (!$this->ligne->contains($produit)) {
            return;
        }
        $this->ligne->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setProduit(null);
    }

    public function addLigneBCF(LigneBCF $produit)
    {


        if ($this->lignebcf->contains($produit)) {
            return;
        }
        $this->lignebcf[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setProduit($this);
    }

    public function removeLigneBCF(LigneBCF $produit)
    {
        if (!$this->lignebcf->contains($produit)) {
            return;
        }
        $this->lignebcf->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setProduit(null);
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
     * @return ArrayCollection|LigneBCF[]
     */
    public function getLigneBCF()
    {
        return $this->lignebcf;
    }


    /**
     * @param mixed $lignebcf
     */
    public function setLigneBCF($lignebcf)
    {
        $this->lignebcf = $lignebcf;
    }




    public function addLigneFC(LigneFC $produit)
    {


        if ($this->lignefc->contains($produit)) {
            return;
        }
        $this->lignefc[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setProduit($this);
    }

    public function removeLigneFC(LigneFC $produit)
    {
        if (!$this->lignefc->contains($produit)) {
            return;
        }
        $this->lignefc->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setProduit(null);
    }


    public function addLigneFF(LigneFF $produit)
    {


        if ($this->ligneff->contains($produit)) {
            return;
        }
        $this->ligneff[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setProduit($this);
    }

    public function removeLigneFF(LigneFF $produit)
    {
        if (!$this->ligneff->contains($produit)) {
            return;
        }
        $this->ligneff->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setProduit(null);
    }


    /**
     * @return ArrayCollection|LigneFC[]
     */
    public function getLigneFC()
    {
        return $this->lignefc;
    }


    /**
     * @param mixed $ligne
     */
    public function setLigneFC($ligne)
    {
        $this->lignefc = $ligne;
    }



    /**
     * @return ArrayCollection|LigneFF[]
     */
    public function getLigneFF()
    {
        return $this->ligneff;
    }


    /**
     * @param mixed $ligneff
     */
    public function setLigneFF($ligneff)
    {
        $this->ligneff = $ligneff;
    }

    /**
     * @return ArrayCollection|LigneBLC[]
     */
    public function getLigneLC()
    {
        return $this->lignelc;
    }


    /**
     * @param mixed $lignelc
     */
    public function setLigneLC($lignelc)
    {
        $this->lignelc = $lignelc;
    }








    /**
     * @return mixed
     */
    public function getPrixvente()
    {
        return $this->prixvente;
    }

    /**
     * @param mixed $prixvente
     */
    public function setPrixvente($prixvente)
    {
        $this->prixvente = $prixvente;
    }

    /**
     * @return mixed
     */
    public function getPrixachat()
    {
        return $this->prixachat;
    }

    /**
     * @param mixed $prixachat
     */
    public function setPrixachat($prixachat)
    {
        $this->prixachat = $prixachat;
    }


    public function addLigneBLC(LigneBLC $produit)
    {


        if ($this->lignelc->contains($produit)) {
            return;
        }
        $this->lignelc[] = $produit;
        // needed to update the owning side of the relationship!
        $produit->setProduit($this);
    }

    public function removeLigneBLC(LigneBLC $produit)
    {
        if (!$this->lignelc->contains($produit)) {
            return;
        }
        $this->lignelc->removeElement($produit);
        // needed to update the owning side of the relationship!
        $produit->setProduit(null);
    }













}
