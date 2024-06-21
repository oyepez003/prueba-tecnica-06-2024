<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/user')]
final class UserController extends BaseController
{
    public function __construct(private UserService $userService)
    {
    }

    #[Route(
        name: 'app_user_index', 
        methods:[Request::METHOD_GET]
    )]
    public function index(): JsonResponse
    {
        $user = $this->getUser();
        return $this->json($user);
    }

    #[Route(
        name: 'app_user_update', 
        methods:[Request::METHOD_PUT]
    )]
    public function update(
        #[MapRequestPayload(validationGroups: 'update')] User $userDto
    ): JsonResponse
    {
        $user = $this->userService->update(
            $this->getUser(), 
            $userDto
        );
        return $this->json($user);
    }
}
