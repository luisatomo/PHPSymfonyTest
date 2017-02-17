<?php

namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Class BaseManager
 * @package AppBundle\Manager
 */
class BaseManager
{
    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @param $object
     */
    public function save($object)
    {
        $this->repository->save($object);
    }

    /**
     * @param $object
     */
    public function remove($object)
    {
        $this->repository->delete($object);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getFind($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @return mixed
     */
    public function getFindAll()
    {
        return $this->repository->findAll();
    }
}
