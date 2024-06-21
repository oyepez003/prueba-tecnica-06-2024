<?php

namespace App\Repository;

use App\Entity\ContentRate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends BaseRepository<ContentRate>
 */
class ContentRateRepository extends BaseRepository 
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentRate::class);
    }
}
