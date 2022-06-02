<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/23/2016
 * Time: 12:20 PM
 */

namespace MyNameSpace\AnnualReport;

use WS\Database\DSN\MySQL;
use WS\Database\PDO;

// General singleton class.
class Database
{
    public $pdo;
    private static $instance;

    private function __construct()
    {
        $this->pdo = new PDO(new MySQL('ssd-api'));
    }

    //singleton pattern
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}
