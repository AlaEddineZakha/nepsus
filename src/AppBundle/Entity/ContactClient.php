<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 16/05/2017
 * Time: 18:44
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="integer",nullable=true)
     */private $telephone;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */private $mobile;
    /**
     * @ORM\Column(type="integer",nullable=true)
     * @Assert\Length(min="8",minMessage="This value is to shoort")
     * @Assert\Length(max="8",maxMessage="This value is to long")
     */private $fax;
    /**
     * @ORM\Column(type="string",nullable=true , unique=true)
     */private $email;

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
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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