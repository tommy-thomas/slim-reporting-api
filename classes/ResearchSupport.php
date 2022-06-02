<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:53 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ResearchSupport"))
 */
class ResearchSupport extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkResearchSupport;
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $fkFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $fkAcademicYear;
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
     * @SWG\Property(example="2015-07-01")
     *
     */
    public $ResearchSupportStartDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2016-07-01")
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
     * @SWG\Property(example="These are comments.")
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


    public function getpkResearchSupportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAcademicYearDataType() {
        return \PDO::PARAM_STR;
    }
    public function getResearchSupportStartDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getResearchSupportEndDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAmountDataType() {
        return \PDO::PARAM_STR;
    }
    public function getCommentsDataType() {
        return \PDO::PARAM_STR;
    }
    public function getLastEditedDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_BOOL;
    }
}