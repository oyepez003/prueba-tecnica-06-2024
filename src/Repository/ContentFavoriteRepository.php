<?php

namespace App\Repository;

use App\Entity\ContentFavorite;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends BaseRepository<ContentFavorite>
 */
class ContentFavoriteRepository extends BaseRepository
{
    public function __construct(
        ManagerRegistry $registry,
        private PaginatorInterface $paginator
    )
    {
        parent::__construct($registry, ContentFavorite::class);
    }

    public function paginate(User $user, int $page = 1, int $limit = 10, $options = [], $filters = []): PaginationInterface
    {
        $dql = "SELECT c FROM 
                App\Entity\Content c,
                App\Entity\ContentFavorite cf,
                App\Entity\User u
                WHERE 
                    cf.content = c
                    AND cf.created_by = u
                    AND u = :user";

        $query = $this->getEntityManager()->createQuery($dql)->setParameters([
            'user' => $user->getId()
        ]);

        $paginator = $this->paginator->paginate(
            $query->execute(),
            $page, 
            $limit,
            $options
        );

        return $paginator;
    }
}
