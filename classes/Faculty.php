<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/15/2016
 * Time: 2:58 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Faculty"))
*/
class Faculty extends User {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     */
    public $pkFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     */
    public $pkReport;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     */
    public $fkAcademicYear;
    /**
     * @var boolean
     *
     * @SWG\Property(example="true")
     */
    public $Active;
    /**
     * @var string
     *
     * @SWG\Property(example="2018-01-01")
     */
    public $SubmittedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2|3|4")
     */
    public $DepartmentIDs;
    /**
     * @var string
     *
     * @SWG\Property(example="Economics|Sociology|Psychology")
     */
    public $DepartmentNames;


    public function getpkUserDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
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
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getSubmittedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getDepartmentIDsDataType() {
        return \PDO::PARAM_STR;
    }
}