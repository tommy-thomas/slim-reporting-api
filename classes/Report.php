<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/15/2016
 * Time: 4:57 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Report"))
 */
class Report extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $pkReport;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $fkAcademicYear;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkAutumnStatus;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkWinterStatus;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkSpringStatus;
    /**
     * @var int
     *
     * @SWG\Property(example="0")
     *
     */
    public $GrantFundedBuyOut;
    /**
     * @var int
     *
     * @SWG\Property(example="0")
     *
     */
    public $OtherCourseRelease;
    /**
     * @var string
     *
     * @SWG\Property(example="Director, International Studies Program")
     *
     */
    public $ReasonForBuyout;
    /**
     * @var string
     *
     * @SWG\Property(example="I had a productive year at the company.  Excited to start new NIA grant and BIG ideas grants.")
     *
     */
    public $NarrativeReport;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:52:54")
     *
     */
    public $CreatedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:52:55")
     *
     */
    public $EditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $EditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2015-06-19 18:18:05")
     *
     */
    public $SubmittedDate;


    public function getpkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAutumnStatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkWinterStatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkSpringStatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGrantFundedBuyOutDataType() {
        return \PDO::PARAM_INT;
    }
    public function getOtherCourseReleaseDataType() {
        return \PDO::PARAM_INT;
    }
    public function getReasonForBuyoutDataType() {
        return \PDO::PARAM_STR;
    }
    public function getNarrativeReportDataType() {
        return \PDO::PARAM_STR;
    }
    public function getCreatedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
    public function getSubmittedDateDataType() {
        return \PDO::PARAM_STR;
    }
}