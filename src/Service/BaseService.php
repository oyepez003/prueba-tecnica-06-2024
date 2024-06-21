<?php

namespace App\Service;

abstract class BaseService
{
    abstract protected function getMainRepository();

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->getMainRepository()->find($id, $lockMode, $lockVersion);
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return $this->getMainRepository()->findOneBy($criteria, $orderBy);
    }

    public function findAll()
    {
        return $this->getMainRepository()->findAll();
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getMainRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function destroy(mixed $entity, bool $flush = true) : void
    {
        $this->getMainRepository()->destroy($entity, $flush);
    }
}
