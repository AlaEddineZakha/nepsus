<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:48
 */

namespace AppBundle\Entity\Paiement;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\FactureClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 */
class Transaction
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FactureClient", inversedBy="paiement" , fetch="EAGER")
     * @ORM\JoinColumn(name="facture_id", referencedColumnName="id")
     */
    private $facture;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FactureFournisseur", inversedBy="paiement" , fetch="EAGER")
     * @ORM\JoinColumn(name="facturefournisseur_id", referencedColumnName="id")
     */
    private $facturefournisseur;
    /**
     * @ORM\Column(type="date")
     */
    private $datepaiement;
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paiement\Devise", inversedBy="paiement" , fetch="EAGER")
     * @ORM\JoinColumn(name="devise_id", referencedColumnName="id")
     */
    private $devise;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paiement\MethodeTransaction", inversedBy="paiement" , fetch="EAGER")
     * @ORM\JoinColumn(name="methodetransaction_id", referencedColumnName="id")
     */
    private $methodetransaction;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;
    /**
     * @ORM\Column(type="string")
     */
    private $note ;
    /**
     * @ORM\Column(type="string")
     */
    private $etat;


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
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * @param mixed $facture
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;
    }



    /**
     * @return mixed
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * @param mixed $datepaiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;
    }

    /**
     * @return mixed
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * @param mixed $devise
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;
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
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
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
    public function getMethodetransaction()
    {
        return $this->methodetransaction;
    }

    /**
     * @param mixed $methodetransaction
     */
    public function setMethodetransaction($methodetransaction)
    {
        $this->methodetransaction = $methodetransaction;
    }

    /**
     * @return mixed
     */
    public function getFacturefournisseur()
    {
        return $this->facturefournisseur;
    }

    /**
     * @param mixed $facturefournisseur
     */
    public function setFacturefournisseur($facturefournisseur)
    {
        $this->facturefournisseur = $facturefournisseur;
    }





}