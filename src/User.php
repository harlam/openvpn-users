<?php

namespace harlam\OpenVPN\Users;

use DateTime;
use harlam\OpenVPN\Users\Interfaces\UserInterface;

class User implements UserInterface
{
    /** @var string */
    public $username;
    /** @var string */
    public $password;
    /** @var boolean */
    public $is_active;
    /** @var string */
    public $created_at;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt()
    {
        $result = DateTime::createFromFormat('Y-m-d H:i:s', $this->created_at);

        if ($result === false) {
            return null;
        }

        return $result;
    }
}