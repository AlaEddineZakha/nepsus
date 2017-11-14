<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 14/11/2017
 * Time: 14:26
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_fournisseur")
 */
class ContactFournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nom;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseur", inversedBy="contacts")
     * @ORM\JoinColumn(nullable=false , name="fournisseur_id", referencedColumnName="id")
     */
    private $fournisseur;



    /**
     * @ORM\Column(type="datetime")
     */private $created;

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




}