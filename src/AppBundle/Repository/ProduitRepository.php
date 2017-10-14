<?php

namespace AppBundle\Repository;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{

    public function getByCategId($categId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Produit p WHERE p.category= :categid'
            )
            ->setParameter('categid', $categId)
            ->getResult();
    }

    public function getPrixByLibele($lib)
    {

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.prixvente FROM AppBundle:Produit p WHERE p.id= :lib'
            )
            ->setParameter('lib', $lib)
            ->getSingleScalarResult();
    }

    public function getAll()
    {

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Produit p WHERE p.etat= :lib'
            )
            ->setParameter('lib', 'En vente')
            ->getResult();
    }
}
