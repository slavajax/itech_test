<?php


namespace application\core;


class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        if (file_exists('application/config/routes.php')) {
            $routes = require_once 'application/config/routes.php';
            foreach ($routes as $route => $params) {
                $this->add($route, $params);
            }
        }
    }

    /**
     * Добавление всех имеющихся роутов
     * @param $route
     * @param $params
     */
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    /**
     * Проверить, есть ли роутер по вызываемому URL
     * @return bool
     */
    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Подключение экшенов и контроллеров
     * на соответствующие роуты
     */
    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}