<?php

namespace App\Service;

use App\Entity\Content;
use App\Entity\ContentFavorite;
use App\Entity\ContentRate;
use App\Entity\User;
use App\Helper\Paginator;
use App\Repository\ContentFavoriteRepository;
use App\Repository\ContentRateRepository;
use App\Repository\ContentRepository;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;

class ContentService extends BaseService
{
    public function __construct(
        private ContentRepository $contentRepository,
        private ContentRateRepository $contentRateRepository,
        private ContentFavoriteRepository $contentFavoriteRepository
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

    public function rate(User $user, Content $content, ContentRate $contentRateDto): ContentRate {
        $contentRateDto->setCreatedBy($user);
        $contentRateDto->setContent($content);
        $contentRateDto->setCreatedAt(new DateTimeImmutable());

        $this->contentRateRepository->persist($contentRateDto);

        return $contentRateDto;
    }

    public function markAsFavorite(User $user, Content $content): ContentFavorite {
        $contentFavorite = new ContentFavorite();
        $contentFavorite->setCreatedBy($user);
        $contentFavorite->setContent($content);
        $contentFavorite->setCreatedAt(new DateTimeImmutable());
        $this->contentFavoriteRepository->persist($contentFavorite);

        return $contentFavorite;
    }

    public function paginateFavorites(User $user, int $page = 1, int $limit = 10, $options = [], $filters = []): array
    {
        $pagination = $this->contentFavoriteRepository->paginate($user, $page, $limit, $options, $filters);

        return Paginator::toArray($pagination);
    }
}
