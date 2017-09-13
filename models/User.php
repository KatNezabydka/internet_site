<?php

class User
{
    public static function register($name, $surname, $email, $password)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, surname, email, password) VALUES (:name, :surname, :email, :password)';
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hash_password, PDO::PARAM_STR);

        return $result->execute();

    }

    // Проверяем имя - не меньше, чем 2 символа
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    // Проверяем имя - не меньше, чем 10 символа
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }


    // Проверяем фамилию - не меньше, чем 2 символа
    public static function checkSurname($surname)
    {
        if (strlen($surname) >= 2) {
            return true;
        }
        return false;
    }

    // Проверяем пароль - не меньше, чем 6 символа
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    // Проверяем $email
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

// Проверяем - существует ли такой $email в БД
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn()) {
            echo "запрос вернул что такая строка есть";
            return true;
        }
        return false;
    }

    //Изменение данных в личном кабинете
    public static function edit($id, $name, $surname, $password)
    {

        $db = Db::getConnection();

        $sql = 'UPDATE user
                SET name = :name, surname = :surname, password = :password
                WHERE id = :id';

        $result = $db->prepare($sql);
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':password', $hash_password, PDO::PARAM_STR);
        return $result->execute();

    }

    //Проверяем существует ли пользователь с заданными $email и $password
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        //если нашли пользователя с таким email, нужно теперь проверить совпадают ли пароли
        if ($user) {
            if (password_verify($password, $user['password']))
                return $user['id'];
        }
        return false;

    }

    //Запоминаем пользователя
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;

    }

    //Запоминаем пользователя
    public static function checkLogged()
    {
        //Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];

        }
        header("Location: /user/login");

    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) return false;
        return true;
    }

    public static function getUserById($id)
    {

        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }


}