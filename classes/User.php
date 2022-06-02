<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/12/2016
 * Time: 4:16 PM
 */

namespace MyNameSpace\AnnualReport;


abstract class User extends \Shared\DynamicGetterSetter {

    public $pkUser;
    public $personID;
    public $LastName;
    public $FirstName;
    public $Email;

    public function getpkUserDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpersonIDDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFirstNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEmailDataType() {
        return \PDO::PARAM_STR;
    }
}