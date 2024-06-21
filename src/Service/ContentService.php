<?php

namespace App\Service;

use App\Entity\Content;
use App\Helper\Paginator;
use App\Repository\ContentRepository;
use Symfony\Component\Uid\Uuid;

class ContentService extends BaseService
{
    public function __construct(
        private ContentRepository $contentRepository,
    )
    {
    }

    protected function getMainRepository() {
        return $this->contentRepository;
    }

    public function create(Content $content): Content
    {
        $content->setUuid(Uuid::v1()->toString());
        $this->contentRepository->persist($content);

        return $content;
    }

    public function update(Content $content, Content $contentDto): Content
    {
        $content->syncFieldsUsing($contentDto);
        $this->contentRepository->persist($content);

        return $content;
    }

    public function paginate(int $page = 1, int $limit = 10, $options = [], $filters = []): array
    {
        $pagination = $this->contentRepository->paginate($page, $limit, $options, $filters);

        return Paginator::toArray($pagination);
    }
}
