<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 08/04/2017
 * Time: 20:11
 */

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role", inversedBy="user")
     */
    private $role;
    /**
     * @ORM\Column(type="string", length=255  ,nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * One User has Many tasks.
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Tache",
     *     mappedBy="user" ,
     *     cascade={"persist"},
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true
     * )
     */
    private $taches;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->taches = new ArrayCollection();
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

    public function addTransaction(Tache $tache)
    {


        if ($this->taches->contains($tache)) {
            return;
        }
        $this->taches[] = $tache;
        // needed to update the owning side of the relationship!
        $tache->setUser($this);
    }

    public function removeTransaction(Tache $tache)
    {
        if (!$this->taches->contains($tache)) {
            return;
        }
        $this->taches->removeElement($tache);
        // needed to update the owning side of the relationship!
        $tache->setUser(null);
    }


    /**
     * @return ArrayCollection|Tache[]
     */
    public function getTransactions()
    {
        return $this->taches;
    }



}
