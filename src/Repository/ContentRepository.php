<?php

namespace App\Repository;

use App\Entity\Content;
use App\Repository\Concerns\HasRepositoryMethods;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends BaseRepository<Content>
 */
class ContentRepository extends BaseRepository 
{
    public function __construct(
        ManagerRegistry $registry,
        private PaginatorInterface $paginator
        )
    {
        parent::__construct($registry, Content::class);
    }

    public function paginate(int $page = 1, int $limit = 10, $options = [], $filters = []): PaginationInterface
    {
        $dql = "SELECT c FROM App\Entity\Content c";
        $parameters = [];

        if(isset($filters['title']) || isset($filters['description'])) {
            $dql .= ' WHERE ';
            if(isset($filters['title']) && $filters['title']) {
                $dql .= " c.title LIKE :title ";
                $parameters['title'] = '%' . $filters['title'] . '%';
                if(isset($filters['description'])) {
                    $dql .= " OR ";
                }
            }
            if(isset($filters['description']) && $filters['description']) {
                $dql .= " c.description LIKE :description ";
                $parameters['description'] = '%' . $filters['description'] . '%';
            }
        }

        $query =  $this->getEntityManager()->createQuery($dql);

        if($parameters) {
            $query->setParameters($parameters);
        }

        $paginator = $this->paginator->paginate(
            $query->execute(),
            $page, 
            $limit,
            $options
        );

        return $paginator;
    }
}
