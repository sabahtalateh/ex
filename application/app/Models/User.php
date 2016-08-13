<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public $username;
    public $email;
    public $password;

    public function save()
    {
        $statement = self::getConnection()->prepare("
            INSERT INTO {$this->table} (username, email, password, created_at)
            VALUES (:username, :email, :password, :created_at)
            ");

        try {
            return $statement->execute([
                "username" => $this->username,
                "email" => $this->email,
                "password" => crypt($this->password),
                "created_at" => date("Y-m-d H:i:s")
            ]);
        } catch (\Exception $e) {

        }
    }
}