<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/15/2016
 * Time: 5:12 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Course"))
 */
class Course extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkCourse;
    /**
     * @var int
     *
     * @SWG\Property(example="101")
     *
     */
    public $fkReport;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkQuarter;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkCourseType;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $IsCoreCurriculum;
    /**
     * @var string
     *
     * @SWG\Property(example="ANTH 52210: Archaeology Research Design")
     *
     */
    public $CourseTitle;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $IsCoTaught;
    /**
     * @var int
     *
     * @SWG\Property(example="30")
     *
     */
    public $UndergratuateEnrollment;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $GraduateEnrollment;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;
    /**
     * @var string
     *
     * @SWG\Property(example="010046")
     *
     */
    public $CRSE_ID;
    /**
     * @var string
     *
     * @SWG\Property(example="12140720")
     *
     */
    public $INSTRUCTOR_EMPLID;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $CLASS_NBR;
    /**
     * @var string
     *
     * @SWG\Property(example="2176")
     *
     */
    public $STRM;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 15:26:33")
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


    public function getpkCourseDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkQuarterDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkCourseTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getIsCoreCurriculumDataType() {
        return \PDO::PARAM_INT;
    }
    public function getCourseTitleDataType() {
        return \PDO::PARAM_STR;
    }
    public function getIsCoTaughtDataType() {
        return \PDO::PARAM_INT;
    }
    public function getUndergratuateEnrollmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGraduateEnrollmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getCRSE_IDDataType() {
        return \PDO::PARAM_STR;
    }
    public function getCLASS_NBRDataType() {
        return \PDO::PARAM_STR;
    }
    public function getINSTRUCTOR_EMPLIDDataType() {
        return \PDO::PARAM_STR;
    }
    public function getSTRMDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
}