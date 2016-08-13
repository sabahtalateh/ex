<?php

namespace App\Components\Request;

class Request
{
    protected $request;
    protected $server;

    /**
     * Request constructor.
     * @param $request
     * @param $server
     */
    public function __construct($request, $server)
    {
        $this->request = $request;
        $this->server = $server;
    }

    public function get($name)
    {
        return $this->request[$name];
    }

    public function back()
    {
        header('Location: ' . $this->server['HTTP_REFERER']);
    }

    public function all()
    {
        return $this->request;
    }
}