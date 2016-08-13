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
        echo $this->blade()->view()->make('pages.registration', [
            'lang' => Internationalizator::getCurrentLang()
        ])->render();
    }

    public function postIndex()
    {
        $registrationValidator = new Validator();
        $registrationValidator->setRules([
            'first_name' => [
                'required' => 'Firstname is required',
                'min:3' => 'Firstname is too short',
            ],
            'email' => [
                'required' => 'Email is required',
                'email' => 'Email is not valid',
            ],
            'password' => [
                'required' => 'Password is required',
                'min:6' => 'Password is too short'
            ],
            'password_confirmation' => [
                'required' => 'Password confirmation is required',
                'equals:password' => 'Password confirmation must be equals with password',
            ]
        ]);


        if (!$registrationValidator->validate($this->request->all())) {
            Flash::set('errors', $registrationValidator->getErrorMessages());
            $this->request->back();
        }

        $user = new User();
        $user->username = $this->request->get('first_name');
        $user->email = $this->request->get('email');
        $user->password = $this->request->get('password');
        $user->save();

    }
}