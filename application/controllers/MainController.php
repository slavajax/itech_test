<?php


namespace application\controllers;

use application\core\BaseController;

class MainController extends BaseController
{
    /**
     * Action главной страницы сайта
     * $context - переменные в шаблоне
     */
    public function indexAction()
    {
        $title = 'Главная страница';
        $context = [];
        $this->view->render($title, $context);
    }
}