<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:43 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ProfessionalService"))
 */
class ProfessionalService extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkProfessionalService;
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
     * @SWG\Property(example="100")
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
    public $fkProfessionalServiceType;
    /**
     * @var string
     *
     * @SWG\Property(example="Manuscript Review")
     *
     */
    public $ProfessionalServiceType;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $ProfessionalServiceDescription;
    /**
     * @var string
     *
     * @SWG\Property(example="Chicago")
     *
     */
    public $ProfessionalServiceLocation;
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
     * @SWG\Property(example="2018-01-01")
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
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;


    public function getpkProfessionalServiceDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkProfessionalServiceTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getProfessionalServiceTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getProfessionalServiceDescriptionDataType() {
        return \PDO::PARAM_STR;
    }
    public function getProfessionalServiceLocationDataType() {
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