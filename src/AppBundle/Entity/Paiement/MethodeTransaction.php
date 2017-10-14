<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:49
 */

namespace AppBundle\Entity\Paiement;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="methode_transaction")
 */
class MethodeTransaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|Transaction[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paiement\Transaction", mappedBy="methodetransaction", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="paiement_id", referencedColumnName="id" )
     */
    private $paiement;
    /**
     * @ORM\Column(type="string")
     */
    private $libele;
    /**
     * @ORM\Column(type="string")
     */
    private $etat;
    /**
     * @ORM\Column(type="date")
     */
    private $created;
    public function __construct() {

        $this->paiement = new ArrayCollection();
    }

    public function addPaiement(Transaction $pai)
    {


        if ($this->paiement->contains($pai)) {
            return;
        }
        $this->paiement[] = $pai;
        // needed to update the owning side of the relationship!
        $pai->setMethodetransaction($this);
    }

    public function removePaiement(Transaction $pai)
    {
        if (!$this->paiement->contains($pai)) {
            return;
        }
        $this->paiement->removeElement($pai);
        // needed to update the owning side of the relationship!
        $pai->setMethodetransaction(null);
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


}