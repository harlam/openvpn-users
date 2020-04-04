<?php

namespace harlam\OpenVPN\Users\Interfaces;

use DateTime;

/**
 * Interface UserInterface
 * @package harlam\OpenVPN\Users\Interfaces
 */
interface UserInterface
{
    /**
     * @return string
     */
    public function getUsername();

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @return DateTime|null
     */
    public function getCreatedAt();
}