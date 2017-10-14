<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 26/08/2017
 * Time: 11:08
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lot")
 */
class Lot
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    private $entrepot;
    private $produit;
    private $type;
    private $qt;
    private $etat;
    private $created;



}