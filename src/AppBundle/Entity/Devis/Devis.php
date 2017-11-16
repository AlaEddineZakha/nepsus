<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:45
 */

namespace AppBundle\Entity\Devis;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="devis")
 */
class Devis
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;



}