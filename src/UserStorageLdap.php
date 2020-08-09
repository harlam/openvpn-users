<?php

namespace harlam\OpenVPN\Users;

use harlam\OpenVPN\Users\Exceptions\UserNotFoundException;
use harlam\OpenVPN\Users\Interfaces\StorageInterface;
use harlam\OpenVPN\Users\Interfaces\UserInterface;

class UserStorageLdap implements StorageInterface
{

    public function __construct()
    {
    }

    /**
     * @param string $username
     * @return UserInterface
     * @throws UserNotFoundException
     */
    public function findByUsername($username)
    {
        throw new UserNotFoundException("User with name '{$username}' not found");
    }
}