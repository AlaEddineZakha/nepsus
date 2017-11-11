<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 11/11/2017
 * Time: 17:57
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="test")
 */
class Test
{
    /**
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="AUTO")
 * @ORM\Column(type="integer")
 */
    private $id;

}