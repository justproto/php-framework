<?php

namespace PHPFramework;

class Application
{
    public string $uri;
    public Request $request;
    public Response $response;

    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->uri = $_SERVER['QUERY_STRING'];
        $this->request = new Request($this->uri);
        $this->response = new Response();

    }
}