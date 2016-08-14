<?php

namespace App\Models;

use PDO;

abstract class Model
{
    private static $connection;

    /**
     * Model constructor.
     */
    public function __construct()
    {
    }

    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO(
                'mysql:host=' . getenv('DB_HOST') .
                ';dbname=' . getenv('DB_NAME') .
                ';port=' . getenv('DB_PORT'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );
        }

        return self::$connection;
    }

    public abstract function fillModel($row);


}