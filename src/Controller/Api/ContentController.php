<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/content')]
final class ContentController extends AbstractController
{
    public function __construct(private UserService $userService)
    {
    }

    #[Route(
        name: 'app_content_index', 
        methods:[Request::METHOD_GET]
    )]
    public function index(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        name: 'app_content_store', 
        methods:[Request::METHOD_POST]
    )]
    public function store(): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_show', 
        methods:[Request::METHOD_GET],
        requirements: ['content' => '\d+']
    )]
    public function show(int $content): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_update', 
        methods:[Request::METHOD_PUT]
    )]
    public function update(int $content): JsonResponse
    {
        return $this->json([]);
    }

    #[Route(
        path: '/{content}', 
        name: 'app_content_destroy', 
        methods:[Request::METHOD_DELETE]
    )]
    public function destroy(int $content): JsonResponse
    {
        return $this->json([]);
    }
}
