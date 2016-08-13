<?php

namespace App\Models;

use PDO;

class Model
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
            try {
                self::$connection = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';port=' . getenv('DB_PORT'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            } catch (\Exception $e) {
                
            }
        }

        return self::$connection;
    }


}