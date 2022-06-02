<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:37 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ReportService"))
 */
class ReportService extends \Shared\DynamicGetterSetter {

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
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkReportService;
    /**
     * @var int
     *
     * @SWG\Property(example="100")
     *
     */
    public $fkReport;
    /**
     * @var string
     *
     * @SWG\Property(example="The Graham School School of Continuing and Professional Studies")
     *
     */
    public $BookCommitteeCouncilName;
    /**
     * @var string
     *
     * @SWG\Property(example="Board Member (three year term, 2014-17)")
     *
     */
    public $ReportServiceRole;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $AddToNextYearsReport;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:51:53")
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
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;


    public function getfkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkReportServiceDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getBookCommitteeCouncilNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getReportServiceRoleDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAddToNextYearsReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
}