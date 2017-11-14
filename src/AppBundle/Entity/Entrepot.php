<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 22/08/2017
 * Time: 19:14
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntrepotRepository")
 * @ORM\Table(name="entrepot")
 */
class Entrepot
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|Lot[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lot", mappedBy="entrepot", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="lot_id", referencedColumnName="id" )
     */
    private $lot;

    /**
     * @ORM\Column(type="string")
     */
    private $location;
    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="integer")
     */
    private $espacerempli;

    /**
     * @ORM\Column(type="integer")
     */
    private $espacerestant;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

    public function __construct() {
        $this->lot = new ArrayCollection();
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param mixed $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
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


    public function addLot(Lot $lot)
    {


        if ($this->lot->contains($lot)) {
            return;
        }
        $this->lot[] = $lot;
        // needed to update the owning side of the relationship!
        $lot->setEntrepot($this);
    }

    public function removeLot(Lot $lot)
    {
        if (!$this->lot->contains($lot)) {
            return;
        }
        $this->lot->removeElement($lot);
        // needed to update the owning side of the relationship!
        $lot->setEntrepot(null);
    }


    /**
     * @return ArrayCollection|Lot[]
     */
    public function getLot()
    {
        return $this->lot;
    }


    /**
     * @param mixed $lot
     */
    public function setLot($lot)
    {
        $this->lot = $lot;
    }

    /**
     * @return mixed
     */
    public function getEspacerempli()
    {
        return $this->espacerempli;
    }

    /**
     * @param mixed $espacerempli
     */
    public function setEspacerempli($espacerempli)
    {
        $this->espacerempli = $espacerempli;
    }

    /**
     * @return mixed
     */
    public function getEspacerestant()
    {
        return $this->espacerestant;
    }

    /**
     * @param mixed $espacerestant
     */
    public function setEspacerestant($espacerestant)
    {
        $this->espacerestant = $espacerestant;
    }



}