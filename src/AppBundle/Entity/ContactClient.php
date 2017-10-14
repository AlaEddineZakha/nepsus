<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 16/05/2017
 * Time: 18:44
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact_client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactClientRepository")
 */
class ContactClient
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="contacts")
     * @ORM\JoinColumn(nullable=false , name="client_id", referencedColumnName="id")
     */
    private $client;



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



    public function getClient()
    {
        return $this->client;
    }
    public function setClient($client)
    {
        $this->client = $client;
    }



}