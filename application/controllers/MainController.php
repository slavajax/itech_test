<?php


namespace application\controllers;

use application\core\BaseController;
use application\core\Lead;

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
                $lead = new Lead($this->model->fields);

                if (!$lead->send()) {
                    echo 'Лид успешно создан';
                } else {
                    //Можно создать и использовать класс
                    // для работы с логами
                }

            } else {
                $context['fields'] = $this->model->fields;
                $context['errors'] = $this->model->errors;
            }
        }
        $this->view->render($title, $context);
    }
}