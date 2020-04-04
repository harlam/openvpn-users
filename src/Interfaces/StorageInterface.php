<?php

namespace harlam\OpenVPN\Users\Interfaces;

use harlam\OpenVPN\Users\Exceptions\UserNotFoundException;

/**
 * Interface StorageInterface
 * @package harlam\OpenVPN\Users\Interfaces
 */
interface StorageInterface
{
    /**
     * @param string $username
     * @return UserInterface
     * @throws UserNotFoundException
     */
    public function findByUsername($username);
}