<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 14:21
 */

namespace AppBundle\Entity;


use AppBundle\Entity\Paiement\Transaction;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="facture_fournisseur")
 */
class FactureFournisseur
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paiement\Transaction", mappedBy="facturefournisseur", cascade={"persist", "remove"} , fetch="EAGER")
     * @ORM\JoinColumn(name="ligneff_id", referencedColumnName="id" )
     */
    private $paiement;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BonCommandeFournisseur", inversedBy="facture" , fetch="EAGER")
     */
    private $bf;
    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|LigneFF[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LigneFF", mappedBy="facture", cascade={"persist", "remove"} , fetch="EAGER")
     * @ORM\JoinColumn(name="ligneff_id", referencedColumnName="id" )
     */
    private $ligneff;
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
        $this->ligneff = new ArrayCollection();
        $this->paiement = new ArrayCollection();

    }


    public function addLigneFF(LigneFF $ligneFF)
    {


        if ($this->ligneff->contains($ligneFF)) {
            return;
        }
        $this->ligneff[] = $ligneFF;
        // needed to update the owning side of the relationship!
        $ligneFF->setFacture($this);
    }

    public function removeLigneFF(LigneFF $ligneFF)
    {
        if (!$this->ligneff->contains($ligneFF)) {
            return;
        }
        $this->ligneff->removeElement($ligneFF);
        // needed to update the owning side of the relationship!
        $ligneFF->setFacture(null);
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
        return $this->bf;
    }

    /**
     * @param mixed $bcf
     */
    public function setBc($bcf)
    {
        $this->bf = $bcf;
    }

    /**
     * @return ArrayCollection|LigneFF[]
     */
    public function getLigneFF()
    {
        return $this->ligneff;
    }

    /**
     * @param  $ligneff
     */
    public function setLigneFF($ligneff)
    {
        $this->ligneff = $ligneff;
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