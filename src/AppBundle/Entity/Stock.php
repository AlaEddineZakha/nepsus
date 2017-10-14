<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:13
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="stock")
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
}