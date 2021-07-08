<?php


namespace application\controllers;

use application\core\BaseController;

class MainController extends BaseController
{
    /**
     * Action главной страницы сайта,
     * а также обработчик формы
     * $context - переменные в шаблоне
     */
    public function indexAction()
    {
        $title = 'Главная страница';
        $context = [];

        if (!empty($_POST)) {
            if ($this->model->formValidate($_POST)) {
                echo 'Валидация пройдена';
            } else {
                $context['errors'] = $this->model->errors;
            }
        }
        $this->view->render($title, $context);
    }
}