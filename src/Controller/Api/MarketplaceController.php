<?php

namespace App\Controller\Api;

use App\Entity\Content;
use App\Entity\ContentRate;
use App\Service\ContentService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/content')]
final class MarketplaceController extends BaseController
{
    public function __construct(private ContentService $contentService)
    {
    }

    #[Route(
        path: '/{content}/rate',
        name: 'app_marketplace_rate', 
        methods:[Request::METHOD_POST]
    )]
    public function rate(
        Content $content,
        #[MapRequestPayload(validationGroups: 'rate')] ContentRate $contentRateDto
    ): JsonResponse
    {
        $contentRate = $this->contentService->rate($this->getUser(), $content, $contentRateDto);

        return $this->json($contentRate);
    }

    #[Route(
        path: '/{content}/favorite',
        name: 'app_marketplace_favorite', 
        methods:[Request::METHOD_POST]
    )]
    public function favorite(
        Content $content
    ): JsonResponse
    {
        $contentFavorite = $this->contentService->markAsFavorite($this->getUser(), $content);

        return $this->json($contentFavorite);
    }

    #[Route(
        path: '/favorites',
        name: 'app_marketplace_favorites', 
        methods:[Request::METHOD_GET]
    )]
    public function favorites(): JsonResponse
    {
        $contentFavorites = $this->contentService->paginateFavorites($this->getUser());

        return $this->json($contentFavorites);
    }
}
