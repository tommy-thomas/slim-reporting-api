<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:40 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Advisee"))
 */
class Advisee extends \Shared\DynamicGetterSetter
{

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkAdvisee;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkReport;
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
     * @SWG\Property(example="6")
     *
     */
    public $fkAcademicYear;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $fkAdviseeType;
    /**
     * @var string
     *
     * @SWG\Property(example="BA")
     *
     */
    public $AdviseeType;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $fkAdviseeMAType;
    /**
     * @var string
     *
     * @SWG\Property(example="Departmental MA")
     *
     */
    public $AdviseeMAType;
    /**
     * @var boolean
     *
     * @SWG\Property(example="Departmental MA")
     *
     */
    public $IsOutsideAdvisee;
    /**
     * @var string
     *
     * @SWG\Property(example="company of Illinois")
     *
     */
    public $OutsideAdviseeInstitution;
    /**
     * @var string
     *
     * @SWG\Property(example="Mary Smith")
     *
     */
    public $StudentName;
    /**
     * @var string
     *
     * @SWG\Property(example="Logical Movement in Hegel's Logic")
     *
     */
    public $TopicTitle;
    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $fkAdviseeRole;
    /**
     * @var string
     *
     * @SWG\Property(example="Chair")
     *
     */
    public $AdviseeRole;
    /**
     * @var boolean
     *
     * @SWG\Property(example="0")
     *
     */
    public $AddToNextYearsReport;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:52:28")
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


    public function getpkAdviseeDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getpkReportDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getfkFacultyDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getfkAcademicYearDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getfkAdviseeTypeDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getAdviseeTypeDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getfkAdviseeMATypeDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getAdviseeMATypeDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getIsOutsideAdviseeDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getOutsideAdviseeInstitutionDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getStudentNameDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getTopicTitleDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getfkAdviseeRoleDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getAdviseeRoleDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getAddToNextYearsReportDataType()
    {
        return \PDO::PARAM_INT;
    }

    public function getEditedDateDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getEditedByDataType()
    {
        return \PDO::PARAM_STR;
    }

    public function getActiveDataType()
    {
        return \PDO::PARAM_INT;
    }
}