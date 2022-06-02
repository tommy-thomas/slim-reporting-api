<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/21/2016
 * Time: 3:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="FinancialCommitmentReport"))
 */
class FinancialCommitmentReport extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="2015-07-01")
     *
     */
    public $ResearchSupportStartDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2016-06-30")
     *
     */
    public $ResearchSupportEndDate;
    /**
     * @var string
     *
     * @SWG\Property(example="50000")
     *
     */
    public $Amount;
    /**
     * @var string
     *
     * @SWG\Property(example="These are comments")
     *
     */
    public $Comments;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-07-20 14:27:50")
     *
     */
    public $LastEdited;
    /**
     * @var string
     *
     * @SWG\Property(example="Sociology")
     *
     */
    public $DepartmentName;
    /**
     * @var string
     *
     * @SWG\Property(example="Josh")
     *
     */
    public $FirstName;
    /**
     * @var string
     *
     * @SWG\Property(example="Beck")
     *
     */
    public $LastName;


    public function getpkResearchSupportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getResearchSupportStartDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getResearchSupportEndDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAmountDataType() {
        return \PDO::PARAM_INT;
    }
    public function getCommentsDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastEditedDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkDepartmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getDepartmentNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFirstNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastNameDataType() {
        return \PDO::PARAM_STR;
    }
}