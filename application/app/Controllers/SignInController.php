<?php

namespace App\Controllers;

use App\Components\Flash\Flash;
use App\Components\Internationalization\Internationalizator;
use App\Components\Validator\Validator;
use App\Models\User;

class RegisterController extends BaseController
{
    protected $middlewares = [
        \App\Middlewares\DetectLanguage::class
    ];

    public function getIndex()
    {

    }
}