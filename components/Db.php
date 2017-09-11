<?php


class Db
{

//    public static function getConnection()
//    {
//        $paramsPath = ROOT . '/config/db_params.php';
//        $params = include($paramsPath);
//
//        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
//        $db = new PDO($dsn, $params['user'], $params['password']);
//        //убирает проблему с кодировкой
//        $db->exec("set names utf8");
//        return $db;
//    }


    public $db;

    static private $_ins = NULL;


    private function __construct()
    {

        $params = include(ROOT . '/config/db_params.php');

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $this->db = new PDO($dsn, $params['user'], $params['password']);
        //убирает проблему с кодировкой
        $this->db->exec("set names utf8");

    }

    static public function getConnection()
    {

        if (self::$_ins instanceof self) {

            return self::$_ins;

        }

        return self::$_ins = new self;

    }


    private function __wakeup()
    {

    }

    private function __clone()
    {


    }


}









