<?php

namespace App\Repository\Concerns;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @method EntityManagerInterface getEntityManager()
 */
trait HasRepositoryMethods
{
    public function persist(mixed $entity, bool $flush = true)
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}