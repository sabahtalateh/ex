<?php

namespace App\Controllers;

use App\Components\Auth\Auth;
use App\Components\Flash\Flash;
use App\Components\Internationalization\Internationalizator;
use App\Components\Validator\Validator;
use App\Models\User;

class CabinetController extends BaseController
{
    protected $middlewares = [
        \App\Middlewares\DetectLanguage::class,
        \App\Middlewares\Auth::class
    ];

    public function getIndex()
    {
        echo $this->blade()->view()->make('pages.cabinet', [
            'lang' => Internationalizator::getCurrentLang(),
            'user' => User::findByEmail(Auth::getAutUser()['email'])[0]
        ])->render();
    }
}