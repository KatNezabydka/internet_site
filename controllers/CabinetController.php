<?php

class CabinetController
{

    public function actionIndex()
    {
        //идентификатор конкретного пользователя
        $userId = User::checkLogged();

        //получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        require_once(ROOT . '/views/cabinet/index.php');

        return true;

    }

    public function actionEdit()
    {
        //идентификатор конкретного пользователя
        $userId = User::checkLogged();

        //получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $surname = $user['surname'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['password'];

            $errors = false;

            //Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            //Валидация полей
            if (!User::checkSurname($surname)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-х символов';
            }


            if ($errors == false) {
                $result = User::edit($userId, $name, $surname, $password);

            }

        }
        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }
}