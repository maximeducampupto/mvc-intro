<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 02/02/2019
 * Time: 16:25
 */

class Database
{
    private static $instance = null;
    private $conn;
    private function __construct()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'mvc-intro';

        $this->conn = new \PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public static function conn()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->conn;
    }
}