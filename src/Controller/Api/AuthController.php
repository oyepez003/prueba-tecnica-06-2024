<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

#[Route('/api')]
final class AuthController extends AbstractController
{
    public function __construct(private UserService $userService)
    {
    }

    #[Route('/register', name: 'app_security_register', methods:['POST'])]
    public function register(#[MapRequestPayload] User $user): JsonResponse
    {
        $user = $this->userService->createUser($user, $user->getPassword());

        return $this->json(data: $user, context: [AbstractNormalizer::GROUPS => ['read']]);
    }
}
