<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 01/07/2017
 * Time: 15:01
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bon_livraison_client")
 */
class BonLivraisonClient
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


}