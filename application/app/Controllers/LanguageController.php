<?php

namespace App\Controllers;

use App\Components\Internationalization\Internationalizator;

class LanguageController extends BaseController
{
    public function postSetLanguage()
    {
        Internationalizator::setCurrentLang($this->request->get('lang'));
        $this->request->back();
    }
}