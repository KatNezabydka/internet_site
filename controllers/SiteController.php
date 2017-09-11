<?php

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestNewProducts(6);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }


    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = strip_tags($_POST['userEmail']);
            $userText = strip_tags($_POST['userText']);

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Не правильный email.';
            }

            if ($errors == false) {
                $adminEmail = 'katorif@ukr.net';               // почтовый ящик на который будет отправленно письмо
                $subject = 'Teма письма';                           // Тема письма
                $message = "Текст: {$userText}. От {$userEmail}";   // содержание письма
                $header = "Content-Type:text/html; charset=utf-8\r\n";// без этих двуз строк письма не отправляются
                $header .= "From: ";
                $result = mail($adminEmail, $subject, $message, $header . $adminEmail . $userEmail . '\r\n');
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');

        return true;
    }


}