<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 08/11/2017
 * Time: 11:35
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="role_permission")
 * @UniqueEntity(
 *     fields={"role", "permission"},
 *     errorPath="permission",
 *     message="Cette permission est déja affecté à ce role."
 * )
 */
class RolePermission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id ;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role", inversedBy="rolepermission")
     */
    private $role;
    /**
     * @var \Doctrine\Common\Collections\Collection|Permission[]
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Permission", inversedBy="rolepermission")
     */
    private $permission;


    public function __construct() {
        $this->permission = new ArrayCollection();
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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return Permission[]|\Doctrine\Common\Collections\Collection
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param mixed $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }

    public function addPermission(Permission $permission)
    {


        if ($this->permission->contains($permission)) {
            return;
        }
        $this->permission[] = $permission;
        // needed to update the owning side of the relationship!
        $permission->addRolePermission($this);
    }

    public function removePermission(Permission $permission)
    {
        if (!$this->permission->contains($permission)) {
            return;
        }
        $this->permission->removeElement($permission);
        // needed to update the owning side of the relationship!
        $permission->setRolepermission(null);
    }


}