<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 01/07/2017
 * Time: 15:01
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Paiement\Transaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="facture_client")
 */
class FactureClient
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|Transaction[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paiement\Transaction", mappedBy="facture", cascade={"persist", "remove"} , fetch="EAGER")
     * @ORM\JoinColumn(name="lignefc_id", referencedColumnName="id" )
     */
    private $paiement;


    /**
     * Un lot a une seulle commande
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\BonCommandeClient", mappedBy="facture" , fetch="EAGER")
     */
    private $bc;
    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneFC[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneFC", mappedBy="facture", cascade={"persist", "remove"} , fetch="EAGER")
     * @ORM\JoinColumn(name="lignefc_id", referencedColumnName="id" )
     */
    private $lignefc;
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
        $this->lignefc = new ArrayCollection();
        $this->paiement = new ArrayCollection();

    }


    public function addLignefc(LigneFC $ligne)
    {


        if ($this->lignefc->contains($ligne)) {
            return;
        }
        $this->lignefc[] = $ligne;
        // needed to update the owning side of the relationship!
        $ligne->setFacture($this);
    }

    public function removeLignefc(LigneFC $ligne)
    {
        if (!$this->lignefc->contains($ligne)) {
            return;
        }
        $this->lignefc->removeElement($ligne);
        // needed to update the owning side of the relationship!
        $ligne->setFacture(null);
    }

    public function addPaiement(Paiement\Transaction $trans)
    {


        if ($this->paiement->contains($trans)) {
            return;
        }
        $this->paiement[] = $trans;
        // needed to update the owning side of the relationship!
        $trans->setFacture($this);
    }

    public function removePaiement(Paiement\Transaction $trans)
    {
        if (!$this->paiement->contains($trans)) {
            return;
        }
        $this->paiement->removeElement($trans);
        // needed to update the owning side of the relationship!
        $trans->setFacture(null);
    }

    /**
     * @return Transaction[]|\Doctrine\Common\Collections\Collection
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param Transaction[]|\Doctrine\Common\Collections\Collection $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
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
     * @return ArrayCollection|LigneFC[]
     */
    public function getLignefc()
    {
        return $this->lignefc;
    }

    /**
     * @param  $lignefc
     */
    public function setLignefc($lignefc)
    {
        $this->lignefc = $lignefc;
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




}