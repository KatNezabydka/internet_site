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
            $name = strip_tags($_POST['name']);
            $surname = strip_tags($_POST['surname']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

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


            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-х символов';
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

    public static function actionLogin()
    {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            //Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-х символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные не правильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);


                //Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    //Удаляем данные с пользователем из сессии
    public static function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /');
    }



}