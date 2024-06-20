<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    public function createUser(User $user, string $password): User
    {
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $password
        );

        $this->userRepository->upgradePassword($user, $hashedPassword);
        return $user;
    }
}
