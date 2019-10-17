<?php

namespace Domain\Command\Login;


use Domain\Entity\User;
use Domain\Repository\UserRepositoryInterface;

class LoginCommand
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginContext $context): void
    {
        $userDTO = $this->userRepository->findByLogin($context->getLogin());

        if ($userDTO) {
            // authenticate
        }

        $user = new User();

        $this->userRepository->add($user);
    }
}