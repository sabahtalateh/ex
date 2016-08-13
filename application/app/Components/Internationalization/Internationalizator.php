<?php

namespace App\Components\Internationalization;

class Internationalizator
{
    protected static $table;

    protected static $supportedLanguages = [
        'EN', 'RU'
    ];

    /**
     * Internationalizator constructor.
     */
    public static function init()
    {
        self::$table = require __DIR__ . '/Table.php';
    }

    public static function get($needle, $lang)
    {
        return self::$table[$needle][$lang];
    }

    public static function getSupportedLangs()
    {
        return self::$supportedLanguages;
    }

    public static function setCurrentLang($lang)
    {
        $_SESSION['lang'] = $lang;
    }

    public static function getCurrentLang()
    {
        return $_SESSION['lang'];
    }
}