<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/18/2016
 * Time: 11:45 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="HonorAndAwardReport"))
 */
class HonorAndAwardReport extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="Comparative Human Development")
     *
     */
    public $DepartmentName;
    /**
     * @var string
     *
     * @SWG\Property(example="Maestripieri")
     *
     */
    public $LastName;
    /**
     * @var string
     *
     * @SWG\Property(example="Dario")
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
     * @var string
     *
     * @SWG\Property(example="Margo Wilson Award from the Human Behavior and Evolution Society")
     *
     */
    public $AwardName;
    /**
     * @var string
     *
     * @SWG\Property(example="Award for best paper published in the journal Evolution and Human Behavior")
     *
     */
    public $AwardDescription;


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
    public function getAwardNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAwardDescriptionDataType() {
        return \PDO::PARAM_STR;
    }
}