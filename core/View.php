<?php

namespace PHPFramework;

class View
{
    public string $content = '';

    public function __construct(
        public string $layout,
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
            $this->content = ob_get_clean();
        } else {
//            app()->response->setResponseCode(500);
//            return view('errors/500', ['error' => "Not found {$view_file}"], false);
               abort("Not found {$view_file}", 500);
        }

        if ($layout === false){
            return $this->content;
        }

        $layout_file_name = $layout ?: $this->layout;
        $layout_file = VIEWS . "/layouts/{$layout_file_name}.php";

        if (is_file($layout_file)){
            ob_start();
            require_once $layout_file;
            return ob_get_clean();
        } else {
//            app()->response->setResponseCode(500);
//            return view('errors/500', ['error' => "Not found {$layout_file}"], false);
            abort("Not found {$layout_file}", 500);
        }
        return '';
    }
}