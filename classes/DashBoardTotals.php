<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/10/2016
 * Time: 4:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="DashBoardTotals"))
 */
class DashBoardTotals extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $AdviseeTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="20")
     *
     */
    public $GrantAndFellowshipTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="30")
     *
     */
    public $PublicationTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="40")
     *
     */
    public $ProfessionalServiceTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $ReportServiceTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="60")
     *
     */
    public $CourseTotals = [];
    /**
     * @var int
     *
     * @SWG\Property(example="70")
     *
     */
    public $EnrollmentTotals = [];
}