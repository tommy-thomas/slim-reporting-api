<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:45 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Publication"))
 */
class Publication extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkPublication;
    /**
     * @var int
     *
     * @SWG\Property(example="3")
     *
     */
    public $pkFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="100")
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
    public $fkPublicationType;
    /**
     * @var string
     *
     * @SWG\Property(example="Article")
     *
     */
    public $PublicationType;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkPublicationCategory;
    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $fkPublicationStatus;
    /**
     * @var string
     *
     * @SWG\Property(example="Submitted for Review")
     *
     */
    public $PublicationStatusType;
    /**
     * @var string
     *
     * @SWG\Property(example="The Publication")
     *
     */
    public $PublicationTitle;
    /**
     * @var string
     *
     * @SWG\Property(example="The Publication citation.")
     *
     */
    public $PublicationCitation;
    /**
     * @var string
     *
     * @SWG\Property(example="publications.org/publication")
     *
     */
    public $PublicationUrl;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $OriginalFileName;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $SystemFileName;
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


    public function getpkPublicationDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkAcademicYearDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkPublicationTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getPublicationTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getfkPublicationCategoryDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkPublicationSatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getPublicationStatusTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getPublicationTitleDataType() {
        return \PDO::PARAM_STR;
    }
    public function getPublicationCitationDataType() {
        return \PDO::PARAM_STR;
    }
    public function getPublicationUrlDataType() {
        return \PDO::PARAM_STR;
    }
    public function getOriginalFileNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getSystemFileNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
}