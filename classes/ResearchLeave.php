<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:55 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ResearchLeave"))
 */
class ResearchLeave extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkResearchLeave;
    /**
     * @var int
     *
     * @SWG\Property(example="100")
     *
     */
    public $fkFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkResearchLeaveType;
    /**
     * @var string
     *
     * @SWG\Property(example="1Q")
     *
     */
    public $ResearchLeaveType;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkAcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="1|2")
     *
     */
    public $QuarterIDs;
    /**
     * @var string
     *
     * @SWG\Property(example="Autumn|Winter")
     *
     */
    public $Quarters;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $AcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="My Fellowship")
     *
     */
    public $FellowshipName;
    /**
     * @var int
     *
     * @SWG\Property(example="50000")
     *
     */
    public $FellowshipAmount;
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
     * @SWG\Property(example="2018-07-24 11:57:09")
     *
     */
    public $LastEdited;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;


    public function getpkResearchLeaveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkResearchLeaveTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getResearchLeaveTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getQuarterIDsDataType() {
        return \PDO::PARAM_STR;
    }
    public function getQuartersDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAcademicYearDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFellowshipNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getFellowshipAmountDataType() {
        return \PDO::PARAM_STR;
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
}