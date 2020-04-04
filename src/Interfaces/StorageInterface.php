<?php

namespace harlam\OpenVPN\Users\Interfaces;

/**
 * Interface StorageInterface
 * @package harlam\OpenVPN\Users\Interfaces
 */
interface StorageInterface
{
    /**
     * @param string $username
     * @return UserInterface
     */
    public function findByUsername($username);
}