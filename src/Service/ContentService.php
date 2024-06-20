<?php

namespace App\Service;

use App\Entity\Content;
use App\Repository\ContentRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\Uid\Uuid;

class ContentService
{
    public function __construct(
        private ContentRepository $contentRepository,
    )
    {
    }

    public function create(Content $content): Content
    {
        $content->setUuid(Uuid::v1()->toString());
        $this->contentRepository->persist($content);

        return $content;
    }

    public function paginate(): Paginator
    {
        return $this->contentRepository->paginate();
    }
}
