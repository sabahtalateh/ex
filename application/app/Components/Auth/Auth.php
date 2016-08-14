<?php

namespace App\Components\Auth;

use App\Models\User;

class Auth
{
    public static function login($email, $password)
    {
        /** @var User $user */
        $user = User::findByEmail($email)[0];

        if (($user->password) == md5($password)) {
            $_SESSION['auth'] = [
                'username' => $user->username,
                'email' => $user->email,
                'created_at' => $user->createdAt,
                'avatar' => $user->avatar
            ];
            return true;
        }

        return false;
    }

    public static function logout()
    {
        unset($_SESSION['auth']);
    }

    public static function getAutUser()
    {
        return $_SESSION['auth'];
    }

    public function hasAuthUser()
    {
        return isset($_SESSION['auth']);
    }
}