<?php

class Db
{

//    public static function getConnection()
//    {
//        $paramsPath = ROOT . '/config/db_params.php';
//        $params = include($paramsPath);
//
//        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
//        $db = new PDO($dsn, $params['user'], $params['password'], $params['options']);
//        $db->exec("set names utf8");
//        return $db;
//    }

    private $db;

    static private $_instance = NULL;


    public static function getConnection()
    {
        return self::getInstance()->db;
    }

    private function __construct()
    {

        $params = include(ROOT . '/config/db_params.php');

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        try { // проверка на ошибку при подключении к базе данных
            $this->db = new PDO($dsn, $params['user'], $params['password']);
            //убирает проблему с кодировкой
            $this->db->exec("set names utf8");
        } catch (Exception $e) {
            header("Location: /errors");
            exit();
//            $error = $e->getMessage() . ' | ' . $e->getCode();
        }

    }

    static public function getInstance()
    {

        if (self::$_instance instanceof self) {

            return self::$_instance;

        }

        return self::$_instance = new self;

    }


    private function __wakeup()
    {
    }

    private function __clone()
    {
    }


}