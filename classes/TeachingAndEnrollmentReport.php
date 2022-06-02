<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/17/2016
 * Time: 10:59 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="TeachingAndEnrollmentReport"))
 */
class TeachingAndEnrollmentReport extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="Political Science")
     *
     */
    public $DepartmentName;
    /**
     * @var string
     *
     * @SWG\Property(example="Brehm")
     *
     */
    public $LastName;
    /**
     * @var string
     *
     * @SWG\Property(example="John")
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
     * @SWG\Property(example="PLSC 43100: Maximum Likelihood")
     *
     */
    public $CourseTitle;
    /**
     * @var string
     *
     * @SWG\Property(example="Graduate only")
     *
     */
    public $CourseType;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $GraduateEnrollment;
    /**
     * @var int
     *
     * @SWG\Property(example="15")
     *
     */
    public $UndergratuateEnrollment;


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
    public function getCourseTitleDataType() {
        return \PDO::PARAM_STR;
    }
    public function getCourseTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getGraduateEnrollmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getUndergratuateEnrollmentDataType() {
        return \PDO::PARAM_INT;
    }
}