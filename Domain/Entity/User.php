<?php


namespace Domain\Entity;


class User
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string|null
     */
    private $password;

    private function __construct(?int $id, string $login, ?string $password = null)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public static function fromStorage(int $id, string $login): self
    {
        return new self($id, $login);
    }

    public static function fromRegisterForm(string $login, $password): self
    {
        return new self(null, $login, $password);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}