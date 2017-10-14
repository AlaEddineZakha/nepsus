<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 02/10/2017
 * Time: 11:19
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="configuration")
 */
class Configuration
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

}