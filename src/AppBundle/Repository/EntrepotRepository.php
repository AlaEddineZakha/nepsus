<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 13/11/2017
 * Time: 18:43
 */

namespace AppBundle\Repository;


class EntrepotRepository extends \Doctrine\ORM\EntityRepository
{

    public function getAvailable($value)
    {

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Entrepot p WHERE p.espacerestant> :qt'
            )
            ->setParameter('qt',$value)
            ->getResult();
    }

}