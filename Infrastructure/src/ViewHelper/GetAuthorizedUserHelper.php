<?php

namespace Infrastructure\ViewHelper;

use Domain\Entity\User;
use Zend\View\Helper\AbstractHelper;

class GetAuthorizedUserHelper extends AbstractHelper
{
    /**
     * @var User|null
     */
    private $authorizedUser;

    public function __invoke()
    {
        if ($this->authorizedUser) {
            return $this->authorizedUser;
        }

        return false;
    }

    public function setAuthorizedUser(User $user)
    {
        $this->authorizedUser = $user;
    }
}
