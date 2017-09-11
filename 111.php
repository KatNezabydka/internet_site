<?php

class db
{


    public $db;


    static private $_ins = NULL;

    static public function get_instance()
    {

        if (self::$_ins instanceof self) {

            return self::$_ins;

        }

        return self::$_ins = new self;

    }


    public function __construct()
    {

        echo "<h1>Соединение с базой данных</h1>";

        $this->db = new mysqli('localhost', 'root', '', 'super_mag');


        if ($this->db->connect_error) {

            throw new DbException("Ошибка соединения : ");

        }


        $this->db->query("SET NAMES 'UTF8'");

    }


    private function __clone()
    {


    }


}

$obj1 = db::get_instance();
