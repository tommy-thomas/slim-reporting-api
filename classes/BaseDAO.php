<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/18/2016
 * Time: 2:16 PM
 */

namespace MyNameSpace\AnnualReport;

class BaseDAO
{
    protected $pdo;
    protected $class;
    protected $daoContainer;

    public function __construct( $className )
    {
        $db = Database::getInstance();
        $this->pdo = $db->pdo;
        $this->class = __NAMESPACE__ . "\\" . $className;
    }

    public function UserInputToDate($datetime)
    {
        try{
            $date = new \DateTime($datetime);
            return ( (!is_null($datetime) && !empty($datetime)) && ($date->format('Y-m-d'))) ?  $date->format('Y-m-d') : null;
        } catch ( \Exception $e ){
            return null;
        }

    }
}