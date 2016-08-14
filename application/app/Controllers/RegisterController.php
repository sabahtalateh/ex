<?php

namespace App\Controllers;

use App\Components\Flash\Flash;
use App\Components\Internationalization\Internationalizator;
use App\Components\Validator\Validator;
use App\Models\User;

class RegisterController extends BaseController
{
    protected $middlewares = [
        \App\Middlewares\DetectLanguage::class,
        \App\Middlewares\Guest::class,
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
            'username' => [
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


        if (count(User::findByUserName($this->request->get('username'))) > 0) {
            Flash::set('errors', ['username' => ['User with the same username already registered']]);
            $this->request->back();
        }

        if (count(User::findByEmail($this->request->get('email'))) > 0) {
            Flash::set('errors', ['email' => ['User with the same email already registered']]);
            $this->request->back();
        }

        try {
            $user = new User();
            $user->username = $this->request->get('username');
            $user->email = $this->request->get('email');
            $user->password = $this->request->get('password');
            $user->save();

            $this->request->redirect('/sign');
        } catch (\Exception $e) {

            if (!json_decode(getenv('APP_DEBUG'))) {
                $this->request->notFound();
            } else {
                throw $e;
            }
        }

    }
}