<?php


namespace Domain\Command\Login;


class LoginContext
{
    /**
     * @var string
     */
    private $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getLogin(): string
    {
        return $this->login;
    }
}