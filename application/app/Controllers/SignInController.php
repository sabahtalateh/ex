<?php

namespace App\Controllers;

use App\Components\Auth\Auth;
use App\Components\Flash\Flash;
use App\Components\Internationalization\Internationalizator;
use App\Components\Validator\Validator;
use App\Models\User;

class SignInController extends BaseController
{
    protected $middlewares = [
        \App\Middlewares\DetectLanguage::class,
        \App\Middlewares\Guest::class,
    ];

    public function getIndex()
    {
        echo $this->blade()->view()->make('pages.sign', [
            'lang' => Internationalizator::getCurrentLang()
        ])->render();
    }

    public function postIndex()
    {
        $loginResult = Auth::login($this->request->get('email'), $this->request->get('password'));

        if (!$loginResult) {
            Flash::set('errors', ['email' => ['Email or password are incorrect']]);
            $this->request->back();
        } else {
            $this->request->redirect('cabinet');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        $this->request->redirect('/');
    }
}