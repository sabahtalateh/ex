<?php

namespace App\Middlewares;


use App\Components\Request\Request;

class Guest extends Middleware
{

    public function run()
    {
        $request = new Request($_REQUEST,$_SERVER, $_FILES);

        if (\App\Components\Auth\Auth::getAutUser()) {
            $request->redirect('/cabinet');
        }
    }
}