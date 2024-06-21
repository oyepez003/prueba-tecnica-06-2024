<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class AuthController extends BaseController
{
    public function __construct(private UserService $userService)
    {
    }

    #[Route(
        path: '/register', 
        name: 'app_security_register', 
        methods:[Request::METHOD_POST]
    )]
    public function register(
        #[MapRequestPayload(validationGroups: 'register')] User $userDto): JsonResponse
    {
        $user = $this->userService->create($userDto, $userDto->getPassword());

        return $this->json($user);
    }
}
