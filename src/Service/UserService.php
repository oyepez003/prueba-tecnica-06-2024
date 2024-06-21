<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService extends BaseService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    protected function getMainRepository() {
        return $this->userRepository;
    }

    public function create(User $user, string $password): User
    {
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $password
        );

        $this->userRepository->upgradePassword($user, $hashedPassword);
        return $user;
    }

    public function update(User $user, User $userDto): User
    {
        $hashedPassword = null;

        if($userDto->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $userDto->getPassword()
            );
        }

        $user->syncFieldsUsing($userDto);

        if($hashedPassword) {
            $this->userRepository->upgradePassword($user, $hashedPassword);

            return $user;
        }
        
        $this->userRepository->persist($user);

        return $user;
    }
}
