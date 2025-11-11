<?php

namespace PHPFramework;

class View
{

    public function __construct(
        public string $layout,
        public string $content = '',
    )
    {
    }
    public function render($view, $data = [], $layout = ''): string
    {
        extract($data);
        $view_file = VIEWS . "/{$view}.php";
        if (is_file($view_file)){
            ob_start();
            require $view_file;
            return ob_get_clean();
        } else {
            app()->response->setResponseCode(500);
            return view('errors/500');
        }
    }
}