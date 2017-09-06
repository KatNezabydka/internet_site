<?php
//echo 'your request: ' . $_SERVER['REQUEST_URI'];

//FRONT CONTROLLER

//1. Общие настройки
//отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2. Подключение файлов системы
//Подключаем файл Pouter,php
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');
//3. Установка соединения с БД

//4. Вызов Router
$router = new Router();
$router->run();
