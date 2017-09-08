<?php

class UserController
{


    public static function actionRegister()
    {
        $name = '';
        $surname = '';
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }


            if (!User::checkSurname($surname)) {
                $errors[] = 'Фамилия не должно быть короче 2-х символов';
            }


            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }


            if (User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 2-х символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $surname, $email, $password);
            }

        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }
}