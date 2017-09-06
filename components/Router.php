<?php

class Router
{
    //в массиве хранятся маршруты
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);

    }

    //Возвращает uri запроса

    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();

        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // Сравнить $uriPattern (данные из нашего массива news и products) и $uri (строка запроса)

            if (preg_match("~$uriPattern~", $uri)) {
                //определить какой контроллер и action обрабатывают запроc
                $segments = explode('/', $path);
                // берет первый элемент, удаляет его из массива и добавляет слово Controller
                //делаем первую букву строки заглавной
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                //Создать объект, вызвать метод (т.е action) - все в contollers
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                //в методах указывали return true, чтобы если нашел совпадение прервать поиск
                if ($result != null) {
                    break;
                }
            }
        }
    }

//принимает управление от FrontController

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}