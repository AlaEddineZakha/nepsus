<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:08
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lot")
 */
class Lot
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entrepot", inversedBy="lot" )
     * @ORM\JoinColumn(name="entrepot_id", referencedColumnName="id")
     */
    private $entrepot;

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\BonCommandeFournisseur", inversedBy="lot")
     * @ORM\JoinColumn(name="commandefournisseur_id", referencedColumnName="id")
     */
    private $commandefournisseur;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbproduits;
    /**
     * @ORM\Column(type="float")
     */
    private $prix;
    /**
     * @ORM\Column(type="string")
     */
    private $etat;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @return mixed
     */
    public function getEntrepot()
    {
        return $this->entrepot;
    }

    /**
     * @param mixed $entrepot
     */
    public function setEntrepot($entrepot)
    {
        $this->entrepot = $entrepot;
    }

    /**
     * @return mixed
     */
    public function getCommandefournisseur()
    {
        return $this->commandefournisseur;
    }

    /**
     * @param mixed $commandefournisseur
     */
    public function setCommandefournisseur($commandefournisseur)
    {
        $this->commandefournisseur = $commandefournisseur;
    }

    /**
     * @return mixed
     */
    public function getNbproduits()
    {
        return $this->nbproduits;
    }

    /**
     * @param mixed $nbproduits
     */
    public function setNbproduits($nbproduits)
    {
        $this->nbproduits = $nbproduits;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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



}