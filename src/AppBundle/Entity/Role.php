<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 04/11/2017
 * Time: 10:16
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

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

    private $nom;
    private $description;
    /**
     * @ORM\Column(type="date")
     */
    private $created;

}