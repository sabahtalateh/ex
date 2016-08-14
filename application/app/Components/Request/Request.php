<?php

namespace App\Components\Request;

class Request
{
    protected $request;
    protected $server;
    private $files;

    /**
     * Request constructor.
     * @param $request
     * @param $server
     * @param $files
     */
    public function __construct($request, $server, $files)
    {
        $this->request = $request;
        $this->server = $server;
        $this->files = $files;
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

    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo 404;
    }

    public function redirect($location)
    {
        header('Location: ' . $location);
    }

    public function files()
    {
        return $this->files;
    }
}