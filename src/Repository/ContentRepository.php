<?php

namespace App\Repository;

use App\Entity\Content;
use App\Repository\Concerns\HasRepositoryMethods;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Content>
 */
class ContentRepository extends ServiceEntityRepository
{
    use HasRepositoryMethods;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Content::class);
    }

    public function paginate(): Paginator
    {
        $query = $this->getEntityManager()
                    ->createQueryBuilder('c')
                    ->setFirstResult(0)
                    ->setMaxResults(100)
                    ->getQuery();

        $paginator = new Paginator($query, fetchJoinCollection: true);
        $c = count($paginator);
        foreach ($paginator as $post) {
            echo $post->getHeadline() . "\n";
        }
        return $paginator;
    }

    //    /**
    //     * @return Content[] Returns an array of Content objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Content
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
