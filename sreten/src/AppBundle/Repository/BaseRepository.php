<?php


namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Model\BaseInterface;

/**
 * Class BaseRepository
 *
 */
abstract class BaseRepository extends EntityRepository
{
    /**
     * @param BaseInterface $object
     * @return object
     */
    public function save(BaseInterface $object)
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();

        return $object;
    }

    /**
     * @param BaseInterface $object
     */
    public function delete(BaseInterface $object)
    {
        $this->getEntityManager()->remove($object);
        $this->getEntityManager()->flush();
    }

    /**
     * @param BaseInterface $object
     * @return object
     */
    public function refresh(BaseInterface $object)
    {
        $this->getEntityManager()->refresh($object);
        $this->getEntityManager()->flush();

        return $object;

    }
}