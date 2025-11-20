<?php

function app(): \PHPFramework\Application
{
    return  \PHPFramework\Application::$app;
}

function request(): \PHPFramework\Request
{
    return app()->request;
}

function response(): \PHPFramework\Response
{
    return app()->response;
}
function view($view = '', $data = [], $layout = ''): string|\PHPFramework\View
{
    if ($view){
        return app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function base_url($path = ''): string
{
    return PATH . $path;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], false);
    die;
}

function h($str): string
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function old($fieldname): string
{
    return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function get_errors($fieldname, $errors = []): string
{
    $output = '';
    if (isset($errors[$fieldname])){
        $output .= '<div class="invalid-feedback d-block"><ul class="list-unstyled">';
        foreach ($errors[$fieldname] as $error){
            $output .= "<li>{$error}</li>";
        }
        $output .= '</ul></div>';
    }
    return $output;
}