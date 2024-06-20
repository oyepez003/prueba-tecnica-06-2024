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

    public function updateUser(User $user, User $newDataUser): User
    {
        $hashedPassword = null;

        if($newDataUser->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $newDataUser->getPassword()
            );
        }

        $user->syncFieldsUsing($newDataUser);

        if($hashedPassword) {
            $this->userRepository->upgradePassword($user, $hashedPassword);

            return $user;
        }
        
        $this->userRepository->persist($user);

        return $user;
    }
}
