<?php

namespace App\Middlewares;

use App\Components\Internationalization\Internationalizator;

class DetectLanguage extends Middleware
{
    public function run()
    {
        if (!isset($_POST['lang'])) {
            $currentLang = Internationalizator::getCurrentLang();
            if (!isset($currentLang)) {
                Internationalizator::setCurrentLang(getenv('DEFAULT_LANG'));
            }
        }
//        if (isset($_POST['lang'])) {
//            if (!in_array($_POST['lang'], Internationalizator::getSupportedLangs())) {
//                $_SESSION['lang'] = getenv('DEFAULT_LANG');
//            }
//            $_SESSION['lang'] = $_POST['lang'];
//        } else {
//            $_SESSION['lang'] = getenv('DEFAULT_LANG');
//        }
//
//        
    }
}