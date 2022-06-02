<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:48 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="GrantAndFellowship"))
 */
class GrantAndFellowship extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkGrantFellowship;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkReport;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     *
     */
    public $fkGrantFellowshipType;
    /**
     * @var string
     *
     * @SWG\Property(example="External: Foundation")
     *
     */
    public $GrantFellowshipType;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     *
     */
    public $fkGrantFellowshipStatus;
    /**
     * @var string
     *
     * @SWG\Property(example="New or In-progress project")
     *
     */
    public $GrantFellowshipStatus;
    /**
     * @var string
     *
     * @SWG\Property(example="Humanities without Walls: The Global Midwest")
     *
     */
    public $ProjectTitle;
    /**
     * @var string
     *
     * @SWG\Property(example="Mellon Foundation, through The Franke Institute")
     *
     */
    public $FundingAgency;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $Abstract;
    /**
     * @var string
     *
     * @SWG\Property(example="20000")
     *
     */
    public $ProjectBudget;
    /**
     * @var string
     *
     * @SWG\Property(example="20000")
     *
     */
    public $TotalAmountRequested;
    /**
     * @var string
     *
     * @SWG\Property(example="20000")
     *
     */
    public $TotalAmountAwarded;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-09-01")
     *
     */
    public $AwardStartDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2018-06-30")
     *
     */
    public $AwardEndDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-04-18 17:50:38")
     *
     */
    public $EditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="tommyt")
     *
     */
    public $EditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="Increasing the Readiness and  Competitiveness of Uuderrepresented College Students for Graduate Training, Academic Careers in the Biomedical Sciences
    ")
     *
     */
    public $Reason;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $IsAssociatedWithResearchLeave;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;


    public function getpkGrantFellowshipDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkGrantFellowshipTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGrantFellowshipTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getfkGrantFellowshipStatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGrantFellowshipStatusDataType() {
        return \PDO::PARAM_STR;
    }
    public function getProjectTitleDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFundingAgencyDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAbstractDataType() {
        return \PDO::PARAM_STR;
    }
    public function getProjectBudgetDataType() {
        return \PDO::PARAM_STR;
    }
    public function getTotalAmountRequestedDataType() {
        return \PDO::PARAM_STR;
    }
    public function getTotalAmountAwardedDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAwardStartDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAwardEndDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
    public function getReasonDataType() {
        return \PDO::PARAM_STR;
    }
    public function getIsAssociatedWithResearchLeaveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
}