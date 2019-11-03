<?php


namespace Domain\Command\Register;


use Domain\Entity\User;
use Domain\Repository\UserRepositoryInterface;

class RegisterCommand
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterContext $context): bool
    {
        $userDTO = $this->userRepository->findByLogin($context->getLogin());

        if ($userDTO) {
            return false;
        }

        $this->userRepository->add(User::fromRegisterForm(
            $context->getLogin(),
            $context->getPassword()
        ));

        return true;
    }
}