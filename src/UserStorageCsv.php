<?php

namespace harlam\OpenVPN\Users;

use Exception;
use harlam\OpenVPN\Users\Exceptions\UserNotFoundException;
use harlam\OpenVPN\Users\Interfaces\StorageInterface;
use harlam\OpenVPN\Users\Interfaces\UserInterface;

class UserStorageCsv implements StorageInterface
{
    /** @var resource */
    protected $csv;

    /** @var string */
    protected $delimiter;

    /**
     * UserStorageCsv constructor.
     * @param string $filename
     * @param string $delimiter
     * @throws Exception
     */
    public function __construct($filename, $delimiter = ',')
    {
        if (($this->csv = @fopen($filename, "r")) === false) {
            throw new Exception("Storage initialization failed in '{$filename}'");
        }

        $this->delimiter = $delimiter;
    }

    /**
     * @param string $username
     * @return UserInterface
     * @throws UserNotFoundException
     */
    public function findByUsername($username)
    {
        while (($data = fgetcsv($this->csv, 1000, $this->delimiter)) !== false) {
            if (count($data) >= 3 && $data[0] === $username) {
                $user = new User();
                $user->username = $data[0];
                $user->password = $data[1];
                $user->is_active = $data[2] === 'active' ? true : false;
                $user->created_at = isset($data[3]) ? $data[3] : null;

                return $user;
            }
        }

        throw new UserNotFoundException("User with name '{$username}' not found");
    }

    public function __destruct()
    {
        fclose($this->csv);
    }
}