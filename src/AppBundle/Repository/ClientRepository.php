<?php

namespace AppBundle\Repository;

/**
 * Class ClientRepository
 */
class ClientRepository extends BaseRepository
{
    // TODO: modify it as needed

    public function findByUserEmail($userEmail)
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->leftJoin('AppBundle:ClientUser', 'cu', 'WITH', 'cu.client=c.id')
            ->leftJoin('AppBundle:User', 'u', 'WITH', 'cu.user=u.id')
            ->where('u.email LIKE :email')
            ->setParameter('email', "%$userEmail%")
            ->getQuery()
            ->getResult()
            ;
    }
}