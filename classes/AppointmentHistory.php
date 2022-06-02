<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:52 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AppointmentHistory"))
 */
class AppointmentHistory extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkAppointmentHistory;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     *
     */
    public $fkFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="4")
     *
     */
    public $fkFacultyRank;
    /**
     * @var string
     *
     * @SWG\Property(example="Instructor")
     *
     */
    public $FacultyRank;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkFacultyTrack;
    /**
     * @var string
     *
     * @SWG\Property(example="Tenured")
     *
     */
    public $FacultyTrack;
    /**
     * @var string
     *
     * @SWG\Property(example="2000-07-01")
     *
     */
    public $AppointmentHistoryStartDate;
    /**
     * @var string
     *
     * @SWG\Property(example="2014-06-30")
     *
     */
    public $AppointmentHistoryEndDate;

    public function getpkAppointmentHistoryDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkFacultyRankDataType() {
        return \PDO::PARAM_INT;
    }
    public function getFacultyRankDataType() {
        return \PDO::PARAM_STR;
    }
    public function getfkFacultyTrackDataType() {
        return \PDO::PARAM_INT;
    }
    public function getFacultyTrackDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAppointmentHistoryStartDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAppointmentHistoryEndDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getIsOngoingDataType() {
        return \PDO::PARAM_INT;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_BOOL;
    }
}