<?php

// src/AppBundle/Repository/MenuRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ExpressionBuilder;

class MenuRepository extends EntityRepository
{
    public function findOneMenuByID($id)
    {
      /**return $this->getEntityManager()
            ->createQuery('SELECT p FROM AppBundle:Menu p WHERE p.id=:id')
            ->setParameter('id',$id)
            ->getOneOrNullResult();
**/
            return $this
            ->createQueryBuilder('m')
            ->where("m.id= :id")
            ->setParameter('id',$id)
            ->getQuery()
            ->getSingleResult();
    }
}
?>
