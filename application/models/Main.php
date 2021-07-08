<?php


namespace application\models;

use application\core\Model;

class Main extends Model
{
    public $fields;
    public $errors;

    /**
     * Валидация формы
     * Google-recaptcha не интегрирована
     * @param $post
     * @return bool
     */
    public function formValidate($post)
    {
        if ($post['name']) {
            $name = htmlspecialchars($post['name']);
            $nameLength = iconv_strlen($name);
            if ($nameLength < 2 or $nameLength > 20) {
                $this->errors['name'] = 'Имя должно содержать от 2 до 20 символов';
            } else {
                $this->fields['name'] = $name;
            }
        }
        if ($post['email']) {
            $email = htmlspecialchars($post['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'E-mail указан неверно';
            } else {
                $this->fields['email'] = $email;
            }
        }
        if ($post['surname']) {
            $surname = htmlspecialchars($post['surname']);
            $this->fields['surname'] = $surname;
        }
        if ($post['text']) {
            $message = htmlspecialchars($post['text']);
            $this->fields['message'] = $message;
        }

        if ($this->errors) {
            return false;
        }
        return true;
    }
}