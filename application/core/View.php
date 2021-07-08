<?php


namespace application\core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    /**
     * Установить роут и путь
     * View constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * Подключить шаблоны, при этом передать context
     * @param $title
     * @param array $context
     */
    public function render($title, $context = [])
    {
        extract($context);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }
    }

    /**
     * Отдать шаблоны и статусы для соответствующих HTTP-статусов
     * @param $code
     */
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

}