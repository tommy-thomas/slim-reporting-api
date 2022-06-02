<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/19/2016
 * Time: 2:31 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="CurrentAcademicYear"))
 */
class CurrentAcademicYear extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkAcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="2017")
     *
     */
    public $AcademicYearStart;
    /**
     * @var string
     *
     * @SWG\Property(example="2018")
     *
     */
    public $AcademicYearEnd;
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
     * @SWG\Property(example="2018-02-15")
     *
     */
    public $OpenReportDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2018-04-28")
     *
     */
    public $FacultyDeadlineDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2018-07-15")
     *
     */
    public $HardCloseDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2018-07-24")
     *
     */
    public $HardCloseDateNoSubmit;


    public function getpkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAcademicYearStartDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAcademicYearEndDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAcademicYearDataType() {
        return \PDO::PARAM_STR;
    }
    public function getOpenReportDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFacultyDeadlineDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getHardCloseDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getHardCloseDateNoSubmitDataType() {
        return \PDO::PARAM_STR;
    }
}
