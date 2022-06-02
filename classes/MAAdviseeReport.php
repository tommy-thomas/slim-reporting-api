<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/16/2016
 * Time: 4:24 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="MAAdviseeReport"))
 */
class MAAdviseeReport extends \Shared\DynamicGetterSetter {

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
     * @SWG\Property(example="2017 - 18")
     *
     */
    public $AcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="Hortaçsu")
     *
     */
    public $LastName;
    /**
     * @var string
     *
     * @SWG\Property(example="Ali")
     *
     */
    public $FirstName;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $DepartmentalMATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="20")
     *
     */
    public $MAPSSTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="30")
     *
     */
    public $ComputationalSocialScienceTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="40")
     *
     */
    public $InternationalRelationsTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $LatinAmericanTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="60")
     *
     */
    public $MiddleEasternStudiesTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="70")
     *
     */
    public $OtherTotal;


    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkDepartmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getDepartmentNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getpkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAcademicYearDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFirstNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getDepartmentalMATotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getMAPSSTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getComputationalSocialScienceTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getInternationalRelationsTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLatinAmericanTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getMiddleEasternStudiesTotalDataType() {
        return \PDO::PARAM_STR;
    }
    public function getOtherTotalDataType() {
        return \PDO::PARAM_STR;
    }
}