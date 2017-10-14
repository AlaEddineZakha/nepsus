<?php
/**
 * Created by PhpStorm.
 * User: Tlija
 * Date: 18/05/2017
 * Time: 20:32
 */

namespace AppBundle\Repository;


class ContactClientRepository extends \Doctrine\ORM\EntityRepository
{


    public function getByClientId($clientID)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Client p WHERE p.id= :clientID'
            )
            ->setParameter('clientID', $clientID)
            ->getResult();
    }

}