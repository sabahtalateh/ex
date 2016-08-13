<?php

namespace App\Controllers;

use App\Components\Internationalization\Internationalizator;
use Philo\Blade\Blade;

class HelloController extends BaseController
{
    public function getIndex()
    {
        echo $this->blade()->view()->make('pages.hello',[
            'lang' => Internationalizator::getCurrentLang()
        ])->render();
    }
}