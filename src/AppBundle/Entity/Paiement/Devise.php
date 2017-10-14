<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 04/10/2017
 * Time: 15:32
 */

namespace AppBundle\Entity\Paiement;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="devise")
 */
class Devise
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paiement\Transaction", mappedBy="devise", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="paiement_id", referencedColumnName="id" )
     */
    private $paiement;

    /**
     * @ORM\Column(type="string")
     */
    private $libele;
    /**
     * @ORM\Column(type="datetime")
     */
    private $created;
    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function __construct() {

        $this->paiement = new ArrayCollection();
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



    public function addPaiement(Transaction $pai)
    {


        if ($this->paiement->contains($pai)) {
            return;
        }
        $this->paiement[] = $pai;
        // needed to update the owning side of the relationship!
        $pai->setDevise($this);
    }

    public function removePaiement(Transaction $pai)
    {
        if (!$this->paiement->contains($pai)) {
            return;
        }
        $this->paiement->removeElement($pai);
        // needed to update the owning side of the relationship!
        $pai->setDevise(null);
    }

}