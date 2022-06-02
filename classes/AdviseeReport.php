<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/16/2016
 * Time: 11:46 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdviseeReport"))
 */
class AdviseeReport extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="Economics")
     *
     */
    public $DepartmentName;
    /**
     * @var string
     *
     * @SWG\Property(example="Bill")
     *
     */
    public $LastName;
    /**
     * @var string
     *
     * @SWG\Property(example="Smith")
     *
     */
    public $FirstName;
    /**
     * @var string
     *
     * @SWG\Property(example="2017 - 18")
     *
     */
    public $AcademicYear;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     *
     */
    public $BATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="4")
     *
     */
    public $MATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="5")
     *
     */
    public $PHDTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $PostDocTotal;


    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkDepartmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getDepartmentNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFirstNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getpkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAcademicYearDataType() {
        return \PDO::PARAM_STR;
    }
    public function getBATotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getMATotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getPHDTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getPostDocTotalDataType() {
        return \PDO::PARAM_STR;
    }
}