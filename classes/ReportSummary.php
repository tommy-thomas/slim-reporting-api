<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/1/2016
 * Time: 4:52 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ReportSummary"))
 */
class ReportSummary extends \Shared\DynamicGetterSetter
{
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $pkReport;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $ProfileLastEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $ProfileEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $ResidentStatusEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $ResidentStatusEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $TeachingEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="tommyt")
     *
     */
    public $TeachingEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $AdviseeEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="tommyt")
     *
     */
    public $AdviseeEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $ReportServiceEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $ReportServiceEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $ProfessionalServiceEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $ProfessionalServiceEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $PublicationEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $PublicationEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $HonorAwardEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $HonorAwardEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $GrantFellowshipEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $GrantFellowshipEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $CVAttachmentEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $CVAttachmentEditedBy;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30")
     *
     */
    public $NarrativeEditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="system")
     *
     */
    public $NarrativeEditedBy;
}