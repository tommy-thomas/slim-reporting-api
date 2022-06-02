<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/12/2016
 * Time: 4:30 PM
 */

namespace MyNameSpace\AnnualReport;


/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Admin"))
 */
class Admin extends User {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkAdmin;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkAccessLevel;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $AdminAccessLevel;
    /**
     * @var string
     *
     * @SWG\Property(example="1|2|3")
     *
     */
    public $DepartmentIDS;
    /**
     * @var string
     *
     * @SWG\Property(example="Sociology|Economics|Psychology")
     *
     */
    public $Departments;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;

    public function getpkAdminDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAccessLevelDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAdminAccessLevelDataType() {
        return \PDO::PARAM_STR;
    }
    public function getDepartmentIDSDataType() {
        return \PDO::PARAM_STR;
    }
    public function getDepartmentsDataType() {
        return \PDO::PARAM_STR;
    }
}