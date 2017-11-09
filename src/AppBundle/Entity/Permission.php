<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 08/11/2017
 * Time: 09:05
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="permission")
 */
class Permission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $libele;
    /**
     * @ORM\Column(type="string")
     */
    protected $description;
    /**
     * One Cart has One Customer.
     *
     * @var \Doctrine\Common\Collections\Collection|RolePermission[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RolePermission", mappedBy="permission" ,cascade={"persist"})
     * @ORM\JoinColumn(name="rolepermission_id", referencedColumnName="id" )
     */
    private $rolepermission;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

    public function __construct() {
        $this->rolepermission = new ArrayCollection();


    }
    public function addRolePermission(RolePermission $rolepermission)
    {


        if ($this->rolepermission->contains($rolepermission)) {
            return;
        }
        $this->rolepermission[] = $rolepermission;
        // needed to update the owning side of the relationship!
        $rolepermission->addPermission($this);
    }

    public function removeRolePermission(RolePermission $rolepermission)
    {
        if (!$this->rolepermission->contains($rolepermission)) {
            return;
        }
        $this->rolepermission->removeElement($rolepermission);
        // needed to update the owning side of the relationship!
        $rolepermission->setPermission(null);
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