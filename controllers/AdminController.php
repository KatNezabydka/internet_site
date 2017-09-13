<?php

/**
 * Контроллер AdminController
 * Главная страница с админпанели
 */

class AdminController extends AdminBase
{

    // Action для страртовой страницы "Панель администратора"
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        //Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

}