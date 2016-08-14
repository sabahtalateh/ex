<?php

namespace App\Models;

class User extends Model
{
    protected static $table = 'users';

    public $username;
    public $email;
    public $password;
    public $createdAt;
    public $updatedAt;
    public $avatar;

    public function save()
    {
        $table = self::$table;

        $statement = self::getConnection()->prepare("
            INSERT INTO {$table} (username, email, password, created_at)
            VALUES (:username, :email, :password, :created_at)
            ");

        return $statement->execute([
            "username" => $this->username,
            "email" => $this->email,
            "password" => md5($this->password),
            "created_at" => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * @param $username
     * @return array[User]
     */
    public static function findByUserName($username)
    {
        $table = self::$table;

        $statement = self::getConnection()->prepare("
            SELECT id, username, email, created_at, updated_at, password, avatar_path FROM {$table}
            WHERE username = :username
            ");

        $statement->execute([
            'username' => $username
        ]);

        $users = [];
        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $users[] = static::fillModel($row);
        }

        return $users;
    }

    public static function findByEmail($email)
    {
        $table = self::$table;

        $statement = self::getConnection()->prepare("
            SELECT id, username, email, created_at, updated_at, password, avatar_path FROM {$table}
            WHERE email = :email
            ");

        $statement->execute([
            'email' => $email
        ]);

        $users = [];
        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $users[] = static::fillModel($row);
        }

        return $users;
    }

    public static function setAvatar($email, $avatar)
    {
        $table = self::$table;

        $statement = self::getConnection()->prepare("
            UPDATE {$table} SET avatar_path = :avatar WHERE email = :email
            ");

        $statement->execute([
            'email' => $email,
            'avatar' => $avatar
        ]);
    }

    public function fillModel($row)
    {
        $user = new User();
        $user->email = $row['email'];
        $user->password = $row['password'];
        $user->username = $row['username'];
        $user->createdAt = $row['created_at'];
        $user->updatedAt = $row['updated_at'];
        $user->avatar = $row['avatar_path'];

        return $user;
    }
}