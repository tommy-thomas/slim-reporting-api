<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/9/2016
 * Time: 11:16 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ReportActivityLog"))
 */
class ReportActivityLog extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkReportActivityLog;
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $fkReport;
    /**
     * @var string
     *
     * @SWG\Property(example="company SERVICE")
     *
     */
    public $Section;
    /**
     * @var string
     *
     * @SWG\Property(example="UPDATE")
     *
     */
    public $Action;
    /**
     * @var string
     *
     * @SWG\Property(example="jjbrehm")
     *
     */
    public $EditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:52:00")
     *
     */
    public $EditedDate;


    public function getpkReportActivityLogDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getSectionDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActionDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
}