<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 04/11/2017
 * Time: 10:16
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One Cart has One Customer.
     * @var \Doctrine\Common\Collections\Collection|User[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="role", cascade={"persist", "remove"},fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id" )
     */
    private $user;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|RolePermission[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RolePermission", mappedBy="role" ,cascade={"persist"})
     * @ORM\JoinColumn(name="rolepermission_id", referencedColumnName="id")
     */
    private $rolepermission;

    public function __construct() {
        $this->user = new ArrayCollection();
        $this->rolepermission = new ArrayCollection();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return User[]|\Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User[]|\Doctrine\Common\Collections\Collection $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function addUser(User $user)
    {


        if ($this->user->contains($user)) {
            return;
        }
        $this->user[] = $user;
        // needed to update the owning side of the relationship!
        $user->setRole($this);
    }

    public function removeUser(User $user)
    {
        if (!$this->user->contains($user)) {
            return;
        }
        $this->user->removeElement($user);
        // needed to update the owning side of the relationship!
        $user->setRole(null);
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
     * @return RolePermission[]|\Doctrine\Common\Collections\Collection
     */
    public function getRolepermission()
    {
        return $this->rolepermission;
    }

    /**
     * @param RolePermission[]|\Doctrine\Common\Collections\Collection $rolepermission
     */
    public function setRolepermission($rolepermission)
    {
        $this->rolepermission = $rolepermission;
    }



}