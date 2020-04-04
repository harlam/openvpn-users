<?php

namespace harlam\OpenVPN\Users;

use harlam\OpenVPN\Users\Exceptions\UserNotFoundException;
use harlam\OpenVPN\Users\Interfaces\StorageInterface;
use harlam\OpenVPN\Users\Interfaces\UserInterface;
use PDO;
use RuntimeException;

class UserStorageDatabase implements StorageInterface
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $username
     * @return UserInterface
     * @throws UserNotFoundException
     */
    public function findByUsername($username)
    {
        $query = $this->pdo->prepare('select * from users where username = :username');

        if ($query->bindValue('username', $username, PDO::PARAM_STR) === false) {
            throw new RuntimeException('Bind value failed');
        }

        if ($query->execute() === false) {
            throw new RuntimeException('Query exec failed');
        }

        $result = $query->fetchObject(User::class);

        if ($result === false) {
            throw new UserNotFoundException("User with name '{$username}' not found");
        }

        return $result;
    }
}