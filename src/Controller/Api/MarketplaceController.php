<?php

namespace App\Controller\Api;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/content')]
final class MarketplaceController extends AbstractController
{
    public function __construct(private UserService $userService)
    {
    }

    #[Route(
        path: '/{content}/rate',
        name: 'app_marketplace_rate', 
        methods:[Request::METHOD_POST]
    )]
    public function rate(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        path: '/{content}/favorite',
        name: 'app_marketplace_favorite', 
        methods:[Request::METHOD_POST]
    )]
    public function favorite(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        path: '/favorites',
        name: 'app_marketplace_favorites', 
        methods:[Request::METHOD_GET]
    )]
    public function favorites(): JsonResponse
    {
        return $this->json(['favorites']);
    }
}
